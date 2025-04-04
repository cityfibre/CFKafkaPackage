<?php

namespace cityfibre\cfkafkapackage;


use cityfibre\cfkafkapackage\Console\Commands\AccountDeletedSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\AccountSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\AppointmentCancelledSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\AppointmentConfirmedSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\AuthSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\CityDeletedSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\CitySubscriber;
use cityfibre\cfkafkapackage\Console\Commands\GeographicAddressSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\OntDeletedSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\OntSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\ProductDeletedSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\ProductSpecificationSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\ProductSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\ProjectDeletedSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\ProjectSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\PropertyDeletedSubscriber;
use cityfibre\cfkafkapackage\Console\Commands\PropertySubscriber;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
class CFKafkaPackageServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected bool $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/kafka.php' => config_path('kafka.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                PropertySubscriber::class,
                PropertyDeletedSubscriber::class,
                CitySubscriber::class,
                CityDeletedSubscriber::class,
                AuthSubscriber::class,
                AccountSubscriber::class,
                AccountDeletedSubscriber::class,
                OntSubscriber::class,
                OntDeletedSubscriber::class,
                ProductSubscriber::class,
                ProductDeletedSubscriber::class,
                ProjectSubscriber::class,
                ProjectDeletedSubscriber::class,
                GeographicAddressSubscriber::class,
                ProductSpecificationSubscriber::class,
                AppointmentCancelledSubscriber::class,
                AppointmentConfirmedSubscriber::class
            ]);
        }

    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/kafka.php', 'kafka');
    }

}