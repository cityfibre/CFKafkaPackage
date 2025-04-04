<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\AccountEvent;

class OntDeletedSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'cityfibre_ont__c_deleted';
    protected $signature = 'subscribe:cityfibre_ont__c_deleted {--debug : Enable debug mode}';
    protected $eventClass = AccountEvent::class;
}
