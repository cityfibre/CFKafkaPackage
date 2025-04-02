<?php

namespace cityfibre\cfkafkapackage\Listeners;

use cityfibre\cfkafkapackage\KafkaMessages\PropertyMessage;

class PropertyListener extends BaseListener
{
    public function __construct() {
        $this->kafkaMessage = new PropertyMessage( config('kafkaPackage.property.messageMap') );
    }

}
