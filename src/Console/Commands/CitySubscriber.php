<?php

namespace cityfibre\cfkafkapackage\Console\Commands;

use cityfibre\cfkafkapackage\Events\CityEvent;

class CitySubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'salesforce_heroku_compacted_city__c';
    protected $signature = 'subscribe:salesforce_heroku_compacted_city__c {--debug : Enable debug mode}';
    protected $eventClass = CityEvent::class;
}