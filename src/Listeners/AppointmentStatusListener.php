<?php

namespace cityfibre\cfkafkapackage\Listeners;

use Psr\Log\LoggerInterface;

class AppointmentStatusListener extends BaseListener
{

    public function __construct(LoggerInterface $log) {
        $this->log = $log;
        $this->getTopicConfig('appointment');
        $this->log->debug("AppointmentStatusListener __construct kafkaPackage.appointment.messageMap", $this->topicConfig);
    }

}
