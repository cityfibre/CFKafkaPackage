<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AccountDeletedEvent extends BaseEvent
{
    use Dispatchable;

    public string $type = 'delete'; // Setting Delete as default is createUpdate

    public array $data;


    public function __construct(array $message)
    {
        parent::__construct();
        $this->setRules();
        $data = $this->getData($message);
        $this->data = $this->validateData($data);
    }

    public function setRules(): void
    {
        $this->rules = [
            'sf_id' => $this::SFID_VALIDATION
        ];
    }

    /**
     * @throws ValidationException
     */
    public function getData(array $message): array
    {
        Validator::make($message, ['event'=>'required|array'])->validate();
        return $message['event'];
    }

}