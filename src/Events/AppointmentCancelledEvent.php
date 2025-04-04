<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;

class AppointmentCancelledEvent extends BaseEvent
{
    use Dispatchable;


    public array $data;


    public function __construct(array $message)
    {
        parent::__construct();
        $this->setRules();
        $this->data = $this->validateData($message);
    }

    public function setRules(): void
    {
        $this->rules = [
            "reservation_id" => $this::STRING_VALIDATION,
            "state" => $this::STRING_VALIDATION,
        ];
    }

}