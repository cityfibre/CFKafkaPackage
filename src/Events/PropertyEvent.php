<?php

namespace cityfibre\cfkafkapackage\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PropertyEvent extends BaseEvent
{
    use Dispatchable;

    public mixed $message;
    protected array $decodedData;

    public function __construct(array $message)
    {
        parent::__construct();
        $this->setRules();
        $dataString = $this->getData($message);
        $this->decodedData = $this->decodeAndValidateData($dataString);
    }

    public function setRules(): void
    {
        $this->rules = [
            'Id' => $this::SFID_VALIDATION,
            'Name' => $this::STRING_VALIDATION,
            'RecordTypeId' => $this::NULLABLE_STRING_VALIDATION,
            'UPRN__c' => $this::NULLABLE_NUMERIC_VALIDATION,
            'Cabinet_Area_ID__c' => $this::NULLABLE_STRING_VALIDATION,
            'CityR__c' => $this::STRING_VALIDATION,
            'Building_Type__c' => $this::NULLABLE_STRING_VALIDATION,
            'BLPU_Classification__c' => $this::NULLABLE_STRING_VALIDATION,
            'RFS_Status__c' => $this::NULLABLE_STRING_VALIDATION,
            'Date_Rating_DR__c' => $this::NULLABLE_STRING_VALIDATION,
            'Property_Flags__c' => $this::NULLABLE_STRING_VALIDATION,
            'Location_Legacy_ID__c' => $this::NULLABLE_STRING_VALIDATION,
            'Business_Installation_Difficulty__c' => $this::NULLABLE_STRING_VALIDATION,
            'Exclusivity_Batch__c' => $this::NULLABLE_STRING_VALIDATION,
            'Contractual_Home_Type__c' => $this::NULLABLE_STRING_VALIDATION,
            'Coordinates__Latitude__s' => $this::NULLABLE_NUMERIC_VALIDATION,
            'Coordinates__Longitude__s' => $this::NULLABLE_NUMERIC_VALIDATION,
            'Zip_Postal_Code__c' => $this::NULLABLE_STRING_VALIDATION,
            'Network_Readiness_Required__c' => $this::NULLABLE_BOOLEAN_VALIDATION,
            'Exclusivity_End_Date__c' => $this::NULLABLE_STRING_VALIDATION,
            'Demand_Point_Type__c' => $this::NULLABLE_STRING_VALIDATION
        ];
    }

    /**
     * @throws ValidationException
     */
    public function getData(array $message): string
    {
        Validator::make($message, ['data.data'=>'required|string'])->validate();
        return $message['data']['data'];
    }

    /**
     * @throws ValidationException
     */
    public function decodeAndValidateData($data): array
    {
        $dataArray = json_decode($data, true);
        Validator::make($dataArray, $this->rules)->validate();
        return $dataArray;

    }

}