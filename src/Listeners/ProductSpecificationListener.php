<?php

namespace cityfibre\cfkafkapackage\Listeners;

use Psr\Log\LoggerInterface;

class ProductSpecificationListener extends BaseListener
{

    public function __construct(LoggerInterface $log) {
        $this->log = $log;
        $this->getTopicConfig('productSpec');
        $this->log->debug("ProductSpecificationListener __construct kafkaPackage.productSpec.messageMap", $this->topicConfig);
    }

}
