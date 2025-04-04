<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\ProjectDeletedEvent;

class ProjectDeletedSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'cityfibre_project__c_deleted';
    protected $signature = 'subscribe:cityfibre_project__c_deleted {--debug : Enable debug mode}';
    protected $eventClass = ProjectDeletedEvent::class;
}
