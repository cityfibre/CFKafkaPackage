<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\AppointmentCancelledEvent;

class AppointmentCancelledSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'appointment_reservation_cancelled';
    protected $signature = 'subscribe:appointment_reservation_cancelled {--debug : Enable debug mode}';
    protected $eventClass = AppointmentCancelledEvent::class;
}
