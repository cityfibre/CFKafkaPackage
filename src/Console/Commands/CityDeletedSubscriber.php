<?php

namespace cityfibre\cfkafkapackage\Console\Commands;

use cityfibre\cfkafkapackage\Events\CityDeletedEvent;

class CityDeletedSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'cityfibre_city__c_deleted';
    protected $signature = 'subscribe:cityfibre_city__c_deleted {--debug : Enable debug mode}';
    protected $eventClass = CityDeletedEvent::class;
}
