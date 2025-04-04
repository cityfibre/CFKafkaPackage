<?php

namespace cityfibre\cfkafkapackage\Listeners;

use Psr\Log\LoggerInterface;

class GeographicAddressListener extends BaseListener
{

    public function __construct(LoggerInterface $log) {
        $this->log = $log;
        $this->getTopicConfig('geoAddress');
        $this->log->debug("GeographicAddressListener __construct kafkaPackage.geoAddress.messageMap", $this->topicConfig);
    }

}
