<?php

namespace cityfibre\cfkafkapackage\Console\Commands;

use cityfibre\cfkafkapackage\Events\PropertyEvent;

class PropertySubscriber extends AbstractKafkaSubscriber
{
    protected $signature = 'subscribe:sf_cache_property {--debug : Enable debug mode}';
    protected string $topic = 'sf_cache_property';

    protected $eventClass = PropertyEvent::class;
}
