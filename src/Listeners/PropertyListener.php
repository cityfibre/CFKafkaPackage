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

}
