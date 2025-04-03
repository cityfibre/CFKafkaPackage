<?php

namespace cityfibre\cfkafkapackage\Listeners;

use cityfibre\cfkafkapackage\KafkaMessages\PropertyMessage;
use Psr\Log\LoggerInterface;

class PropertyListener extends BaseListener
{
    public function __construct(LoggerInterface $log) {
        $this->log = $log;
        $this->kafkaMessage = new PropertyMessage( config('kafkaPackage.property.messageMap') );
    }

    public function handle($event): void
    {
        $this->log->debug("[PropertyListener] $event");
    }

}
