<?php

namespace cityfibre\cfkafkapackage\Listeners;

use Psr\Log\LoggerInterface;

class PropertyListener extends BaseListener
{

    public function __construct(LoggerInterface $log) {
        $this->log = $log;
        $this->getTopicConfig('property');
        $this->log->debug("PropertyListener __construct kafkaPackage.property.messageMap", $this->topicConfig);
    }

    public function handle($event): void
    {
        $this->log->debug("PropertyListener::handle event: " . json_encode($event->decodedData));
        $service = $this->getService();
        $methodName = $this->getCreateUpdateMethod();
        $service->$methodName($event->decodedData);
    }

}
