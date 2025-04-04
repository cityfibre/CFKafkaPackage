<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\ProductEvent;

class ProductSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'salesforce_heroku_compacted_product2';
    protected $signature = 'subscribe:salesforce_heroku_compacted_product2 {--debug : Enable debug mode}';
    protected $eventClass = ProductEvent::class;
}
