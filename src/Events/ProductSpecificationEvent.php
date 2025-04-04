<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;

class ProductSpecificationEvent extends BaseEvent
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
            'external_id__c' => $this::STRING_VALIDATION,
            'product_type__c' => $this::NULLABLE_STRING_VALIDATION
        ];
    }

}