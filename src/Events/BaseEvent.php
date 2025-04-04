<?php

namespace cityfibre\cfkafkapackage\Events;


use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class BaseEvent {
    public mixed $message;

    public string $type = 'createUpdate';

    protected array $rules = [];
    const SFID_VALIDATION = 'required|string|max:18';
    const STRING_VALIDATION = 'required|string|max:255';
    const BOOLEAN_VALIDATION = 'required|boolean';
    const INTEGER_VALIDATION = 'required|integer';
    const ARRAY_VALIDATION = 'required|array';
    const NULLABLE_STRING_VALIDATION = 'string|nullable|max:255';
    const NULLABLE_INTEGER_VALIDATION = 'integer|nullable';
    const NULLABLE_NUMERIC_VALIDATION = 'numeric|nullable';
    const NULLABLE_BOOLEAN_VALIDATION = 'boolean|nullable';
    const NUMERIC_VALIDATION = 'required|numeric';

    public function __construct()
    {
        //
    }

    /**
     * @throws ValidationException
     */
    public function validateData(array $data): array
    {
        Validator::make($data, $this->rules)->validate();
        return $data;
    }
}


