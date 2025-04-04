<?php

namespace cityfibre\cfkafkapackage\Listeners;

use Psr\Log\LoggerInterface;

class OntListener extends BaseListener
{

    public function __construct(LoggerInterface $log) {
        $this->log = $log;
        $this->getTopicConfig('ont');
        $this->log->debug("OntListener __construct kafkaPackage.ont.messageMap", $this->topicConfig);
    }

}
