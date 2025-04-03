<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PropertyDeletedEvent extends BaseEvent
{
    use Dispatchable;

    public string $type = 'delete'; // Setting Delete as default is createUpdate

    public mixed $message;

    public function __construct($message)
    {
        parent::__construct();
        $this->setRules();
        $dataString = $this->getData($message);
        $this->data = $this->getDataAndValidate($dataString);
    }

    public function setRules(): void
    {
        $this->rules = [
            'Id' => $this::SFID_VALIDATION,
            'Name' => $this::STRING_VALIDATION,
        ];
    }


    /**
     * @throws ValidationException
     */
    public function getData(array $message): array
    {
        Validator::make($message, ['event'=>'required|string'])->validate();
        return $message['event'];
    }

}
