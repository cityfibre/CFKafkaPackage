<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\AccountEvent;

class AccountSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'salesforce_heroku_compacted_account';
    protected $signature = 'subscribe:salesforce_heroku_compacted_account {--debug : Enable debug mode}';
    protected $eventClass = AccountEvent::class;
}
