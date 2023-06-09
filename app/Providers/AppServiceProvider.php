<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Setting;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('settings')){
            $data = Setting::find(1);
            if($data->ssl == 1){
                   \URL::forceScheme('https');
               }
        }

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // return base_path('public_html');
        // $this->app->bind('path.public', function() {
        //     return base_path('public_html');
        // });
        // if ($this->app->environment() !== 'production') {
        //     $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
        //     $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
        // }
    }
}
