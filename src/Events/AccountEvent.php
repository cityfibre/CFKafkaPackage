<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;

class AccountEvent extends BaseEvent
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
            'account_number__c' => $this::STRING_VALIDATION,
            'tier__c' => $this::NULLABLE_STRING_VALIDATION,
            'TMF_Product_Model__c' => $this::NULLABLE_BOOLEAN_VALIDATION,
            'network_readiness__c' => $this::NULLABLE_BOOLEAN_VALIDATION,
        ];
    }

}