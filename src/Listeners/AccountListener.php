<?php

namespace cityfibre\cfkafkapackage\Listeners;

use Psr\Log\LoggerInterface;

class AccountListener extends BaseListener
{

    public function __construct(LoggerInterface $log) {
        $this->log = $log;
        $this->getTopicConfig('account');
        $this->log->debug("AccountListener __construct kafkaPackage.account.messageMap", $this->topicConfig);
    }

}
