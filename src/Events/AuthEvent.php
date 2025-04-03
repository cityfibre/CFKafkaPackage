<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;

class AuthEvent extends BaseEvent
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
            "salesforce_account" => $this::SFID_VALIDATION,
            "ip_addresses.*" => $this::STRING_VALIDATION,
            "active" => $this::BOOLEAN_VALIDATION,
            "buyer_id" => $this::STRING_VALIDATION,
            "oauth2_enabled" => $this::NULLABLE_BOOLEAN_VALIDATION
        ];
    }

}