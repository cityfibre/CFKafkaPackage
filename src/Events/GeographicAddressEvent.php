<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class GeographicAddressEvent extends BaseEvent
{
    use Dispatchable;


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
            'id' => $this::INTEGER_VALIDATION,
            'geographicLocation.id' => $this::INTEGER_VALIDATION,
            'addressType' => $this::STRING_VALIDATION
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