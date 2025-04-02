<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;

class PropertyEvent extends BaseEvent
{
    use Dispatchable;

    protected array $rules = [
        'sfid' => 'required|string',
        'city_code__c' => 'required|string',
    ];

    public mixed $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

}