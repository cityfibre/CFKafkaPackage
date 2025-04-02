<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use Exception;
use Illuminate\Console\Command;
use LogicException;
use Psr\Log\LoggerInterface;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Throwable;
use Junges\Kafka\Contracts\ConsumerMessage;
use Junges\Kafka\Facades\Kafka;

abstract class AbstractKafkaSubscriber extends Command
{
    protected string $topic;
    protected string $parameters = '{--debug : Enable debug mode}';  // Added description for --debug option
    protected $signature;
    protected $description;
    protected LoggerInterface $log;
    protected $eventClass;

    protected int $memoryLimit = 128 * 1024 * 1024; // 128 MB Memory Limit

    public function __construct(LoggerInterface $log)
    {
        parent::__construct();
        $this->log = $log;
        $this->initializeProperties();
    }

    protected function initializeProperties(): void
    {
        if (empty($this->topic)) {
            throw new LogicException(get_class($this) . ' must have a $topic');
        }

        if (empty($this->eventClass)) {
            throw new LogicException(get_class($this) . ' must have a $eventClass');
        }

        $this->signature = 'subscriber:' . $this->topic . ' ' . $this->parameters;
        $this->description = 'Subscriber for ' . $this->topic . ' events.';
    }

    public function handle(): void
    {
        $this->info(sprintf("Listening on [%s]...", $this->topic));

        // Set up Kafka consumer using KafkaConsumerBuilder
        Kafka::Consumer()
            ->withConsumerGroupId(config('kafka.consumer_group_id'))
            ->subscribe($this->topic)
            ->withHandler(function (ConsumerMessage $message) {
                $preview = substr(json_encode($message->getBody()),0, 64) ?? 'No Preview Available';

                if ($this->option('debug')) {
                    $this->info(json_encode($message->getBody()));
                }

                try {
                    $eventClass = $this->eventClass;
                    $event = new $eventClass($message->getBody());
                    event($event);

                } catch (Exception $e) {
                    $this->log->error($e);
                    throw $e;
                }

                // Check memory usage and restart if necessary
                if ($this->memoryExceeded()) {
                    $this->warn('Memory limit exceeded, restarting consumer...');
                    $this->restart();
                }
            })
            ->withAutoCommit()
//            ->onStopConsuming(static function () {
//                $this->log->notice("Stopped Consuming: topic: $this->topic");
//            })
            ->build()
            ->consume()
        ;
    }

    protected function renderException(Throwable $exception): void
    {
        if (app()->runningInConsole()) {
            $this->output->error($exception->getMessage());
        } else {
            app(ExceptionHandler::class)->renderForConsole($this->output, $exception);
        }
    }

    /**
     * Check if memory usage exceeds the defined limit.
     *
     * @return bool
     */
    protected function memoryExceeded(): bool
    {
        return memory_get_usage(true) > $this->memoryLimit;
    }

    /**
     * Gracefully restart the Kafka consumer to free memory.
     */
    protected function restart(): void
    {
        // Exit the consumer to allow Supervisor or system to restart it
        // @Todo Codacy hates this
        $this->log->info("Restarting consumer...");
        exit(0);
    }
}
