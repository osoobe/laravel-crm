<?php

namespace Osoobe\CRM;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class CRMServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'obcrm');

        // $this->publishes([
        //     __DIR__.'/../config/manage-school.php' => config_path('manage-school.php'),
        // ]);
        $this->publishes([
            __DIR__.'/../config/obcrm.php' => config_path('obcrm.php'),
        ]);

        Livewire::component('obcrm::lead-table', config('obcrm.lead-table', \Osoobe\CRM\Http\Livewire\LeadTable::class));


        $this->registerRoutes();
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'as' => "obcrm.",
            'prefix' => config('obcrm.prefix', null),
            'middleware' => config('obcrm.middleware', ['web', 'auth:sanctum', 'role:Admin']),
        ];
    }
}
