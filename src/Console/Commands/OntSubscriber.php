<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\OntEvent;

class OntSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'salesforce_heroku_compacted_ont__c';
    protected $signature = 'subscribe:salesforce_heroku_compacted_ont__c {--debug : Enable debug mode}';
    protected $eventClass = OntEvent::class;
}
