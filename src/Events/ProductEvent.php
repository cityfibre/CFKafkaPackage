<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;

class ProductEvent extends BaseEvent
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
            'isactive' => $this::BOOLEAN_VALIDATION,
            'family' => $this::STRING_VALIDATION,
            'productcode' => $this::STRING_VALIDATION,
            'network_technology_type__c' => $this::NULLABLE_STRING_VALIDATION,
            'symmetrical_speeds__c' => $this::NULLABLE_STRING_VALIDATION,
            'upload_speed__c' => $this::NULLABLE_STRING_VALIDATION,
            'download_speed__c' => $this::NULLABLE_STRING_VALIDATION,
            'product_specification__c' => $this::NULLABLE_STRING_VALIDATION,
        ];
    }

}