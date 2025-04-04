<?php

namespace cityfibre\cfkafkapackage\Listeners;

use Psr\Log\LoggerInterface;

class ProjectListener extends BaseListener
{

    public function __construct(LoggerInterface $log) {
        $this->log = $log;
        $this->getTopicConfig('project');
        $this->log->debug("ProjectListener __construct kafkaPackage.project.messageMap", $this->topicConfig);
    }

}
