<?php

namespace cityfibre\cfkafkapackage\Listeners;

use Psr\Log\LoggerInterface;

class ProductListener extends BaseListener
{

    public function __construct(LoggerInterface $log) {
        $this->log = $log;
        $this->getTopicConfig('product');
        $this->log->debug("ProductListener __construct kafkaPackage.product.messageMap", $this->topicConfig);
    }

}
