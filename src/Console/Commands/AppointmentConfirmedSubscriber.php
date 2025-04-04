<?php

namespace cityfibre\cfkafkapackage\Console\Commands;


use cityfibre\cfkafkapackage\Events\AppointmentConfirmedEvent;

class AppointmentConfirmedSubscriber extends AbstractKafkaSubscriber
{
    protected string $topic = 'appointment_reservation_confirmed';
    protected $signature = 'subscribe:appointment_reservation_confirmed {--debug : Enable debug mode}';
    protected $eventClass = AppointmentConfirmedEvent::class;
}
