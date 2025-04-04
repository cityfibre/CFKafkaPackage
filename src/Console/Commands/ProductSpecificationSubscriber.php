<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\ProductSpecificationEvent;

class ProductSpecificationSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'salesforce_heroku_product_specification__c';
    protected $signature = 'subscribe:salesforce_heroku_product_specification__c {--debug : Enable debug mode}';
    protected $eventClass = ProductSpecificationEvent::class;
}
