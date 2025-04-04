<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\ProjectEvent;

class ProjectSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'salesforce_heroku_project__c';
    protected $signature = 'subscribe:salesforce_heroku_project__c {--debug : Enable debug mode}';
    protected $eventClass = ProjectEvent::class;
}
