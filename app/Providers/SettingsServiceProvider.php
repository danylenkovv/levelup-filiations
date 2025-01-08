<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        foreach ($settings as $key => $value) {
            config()->set("settings.$key", $value);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
