<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;

class PropertyDeletedEvent
{
    use Dispatchable;

    public mixed $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

}
