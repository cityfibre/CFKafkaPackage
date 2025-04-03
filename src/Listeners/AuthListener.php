<?php

namespace cityfibre\cfkafkapackage\Listeners;

use Psr\Log\LoggerInterface;

class AuthListener extends BaseListener
{

    public function __construct(LoggerInterface $log) {
        $this->log = $log;
        $this->getTopicConfig('auth');
        $this->log->debug("AuthListener __construct kafkaPackage.auth.messageMap", $this->topicConfig);
    }

}
