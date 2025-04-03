<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\AuthEvent;

class AuthSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'nd1651_cp_auth_updated';
    protected $signature = 'subscribe:nd1651_cp_auth_updated {--debug : Enable debug mode}';
    protected $eventClass = AuthEvent::class;
}
