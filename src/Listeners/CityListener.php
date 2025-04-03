<?php

namespace cityfibre\cfkafkapackage\Listeners;

use Psr\Log\LoggerInterface;

class CityListener extends BaseListener
{

    public function __construct(LoggerInterface $log) {
        $this->log = $log;
        $this->getTopicConfig('city');
        $this->log->debug("CityListener __construct kafkaPackage.city.messageMap", $this->topicConfig);
    }

}
