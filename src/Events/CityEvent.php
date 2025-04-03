<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;

class CityEvent extends BaseEvent
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
            'sfid' => $this::SFID_VALIDATION,
            'name' => $this::STRING_VALIDATION,
            'city_code__c' => $this::STRING_VALIDATION,
            'ime_service_qualification_enabled__c' => $this::NULLABLE_BOOLEAN_VALIDATION
        ];
    }

}