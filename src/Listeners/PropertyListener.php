<?php

namespace cityfibre\cfkafkapackage\Listeners;

use cityfibre\cfkafkapackage\KafkaMessages\PropertyMessage;
use Psr\Log\LoggerInterface;

class PropertyListener extends BaseListener
{
    private PropertyMessage $kafkaMessage;

    public function __construct(LoggerInterface $log) {
        $this->log = $log;
        $this->log->debug("PropertyListener __construct kafkaPackage.property.messageMap", config('kafka.topic_mapping.property', []));
        $this->kafkaMessage = new PropertyMessage();
    }

    public function handle($event): void
    {
        $this->log->debug("[PropertyListener] $event");
    }

}
