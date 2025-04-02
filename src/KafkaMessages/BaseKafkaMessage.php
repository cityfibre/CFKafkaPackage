<?php

namespace cityfibre\cfkafkapackage\KafkaMessages;

class BaseKafkaMessage
{


    public function __construct( protected array $transformMap ) {
    }

    public function transform($message): array
    {
        // @Todo transform message to array of transformed values
        return [];
    }

}