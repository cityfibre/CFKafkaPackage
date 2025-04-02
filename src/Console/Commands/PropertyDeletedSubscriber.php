<?php

namespace cityfibre\cfkafkapackage\Console\Commands;

use cityfibre\cfkafkapackage\Events\PropertyDeletedEvent;

class PropertyDeletedSubscriber extends AbstractKafkaSubscriber
{
    protected $signature = 'subscribe:cityfibre_property__c_deleted {--debug : Enable debug mode}';
    protected string $topic = 'cityfibre_property__c_deleted';

    protected $eventClass = PropertyDeletedEvent::class;
}
