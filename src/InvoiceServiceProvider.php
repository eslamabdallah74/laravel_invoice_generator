<?php

namespace YourVendor\LaravelInvoiceGenerator;

use Illuminate\Support\ServiceProvider;
use YourVendor\LaravelInvoiceGenerator\Invoice;
use YourVendor\LaravelInvoiceGenerator\Facades\Invoice as InvoiceFacade;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InvoiceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('invoice', function ($app) {
            return new Invoice();
        });

        $this->app->alias('invoice', InvoiceFacade::class);

        $this->mergeConfigFrom(
            __DIR__.'/../config/invoice.php', 'invoice'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'invoice');

        $this->publishes([
            __DIR__.'/../config/invoice.php' => config_path('invoice.php'),
        ], 'invoice-config');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/invoice'),
        ], 'invoice-views');
    }
}

