<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\OntDeletedEvent;

class OntDeletedSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'cityfibre_ont__c_deleted';
    protected $signature = 'subscribe:cityfibre_ont__c_deleted {--debug : Enable debug mode}';
    protected $eventClass = OntDeletedEvent::class;
}
