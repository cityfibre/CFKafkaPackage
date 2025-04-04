<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\ProductDeletedEvent;

class ProductDeletedSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'cityfibre_product2_deleted';
    protected $signature = 'subscribe:cityfibre_product2_deleted {--debug : Enable debug mode}';
    protected $eventClass = ProductDeletedEvent::class;
}
