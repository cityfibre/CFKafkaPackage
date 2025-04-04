<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\GeographicAddressEvent;

class GeographicAddressSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'geographic_address_notification';
    protected $signature = 'subscribe:geographic_address_notification {--debug : Enable debug mode}';
    protected $eventClass = GeographicAddressEvent::class;
}
