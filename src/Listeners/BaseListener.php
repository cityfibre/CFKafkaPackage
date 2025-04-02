<?php

namespace cityfibre\cfkafkapackage\Listeners;

use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;

abstract class BaseListener implements ShouldQueue
{
    use InteractsWithQueue;

    protected $classService;
    protected $validationMethodName;
    protected $deletionClass;
    protected $queuePriority;
    protected $ignoreClasses;

    public $queue = 'default';

    public function handle($event)
    {
        try{
            $topicConfig = config('kafka.topicMapping');
            $appTopics = array_keys($topicConfig);
            if (in_array($this->topic, $appTopics) === false) {
                return true;
            }
            $topicDetails = $topicConfig[$this->topic];
            $service = app($topicDetails['service']);

            $eventClass = get_class($event);
            if (!is_null($this->ignoreClasses) && in_array($eventClass, $this->ignoreClasses))
            {
                return true;
            }
            if ($eventClass === $this->deletionClass)
            {
                return call_user_func_array([$service, $topicDetails['createUpdateMethodName']], $event);
            }
            return call_user_func_array([$service, $topicDetails['deleteMethodName']], $event);

        }
        catch(Exception $e){
            Log::error($e->getMessage());
        }


    }

    protected function handleDeletion($event)
    {
        if (!isset($event->message['eventtype']) || $event->message['eventtype'] !== 'delete')
        {
            return false;
        }

        try
        {
            $this->classService->deleteFromKafkaEvent($event->message);
        }
        catch (Exception $e)
        {
            Log::error($e);
            return false;
        }
        return true;
    }

    protected function handleInsertion($event): bool
    {
        try
        {
            call_user_func_array([$this->validationService, $this->validationMethodName], [$event->message]);
        }
        catch (ValidationException $e)
        {
            Log::error($e->errors());
            return true;
        }

        try {
            $this->classService->upsertFromKafkaEvent($event->message);
        }
        catch (Exception $e)
        {
            Log::error($e->getMessage());
            if ($this->attempts() < config('kafka.ingress_retries'))
            {
                $this->release(config('kafka.ingress_retry_sleep'));
                return false;
            }
            throw $e;
        }

        return true;
    }
}
