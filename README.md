use EventServiceProvider in app to choose which topics to listen to 

need to work out how to pass mapping from topic to models in an orderly way

[
    // Topic name -> Desired Model
    KAFKA_TOPIC___account_updated_compacted___Account::model,
    KAFKA_TOPIC___account_updated_compacted___Account::model,
    property_sf_cache_updated -> Property::model
]
