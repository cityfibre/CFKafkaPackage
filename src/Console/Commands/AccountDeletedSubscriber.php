<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\AccountDeletedEvent;

class AccountDeletedSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'cityfibre_account_deleted';
    protected $signature = 'subscribe:cityfibre_account_deleted {--debug : Enable debug mode}';
    protected $eventClass = AccountDeletedEvent::class;
}
