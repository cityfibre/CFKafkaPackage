<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;

class OntDeletedEvent extends BaseEvent
{
    use Dispatchable;


    public string $type = 'delete'; // Setting Delete as default is createUpdate

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
            'Id' => $this::SFID_VALIDATION
        ];
    }

}