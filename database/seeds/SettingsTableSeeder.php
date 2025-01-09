<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds for site settings.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            ['key' => 'footer_text', 'value' => 'Created By Danylenko'],
            ['key' => 'logo_text', 'value' => 'Filiations'],
            ['key' => 'site_name', 'value' => 'Filiation list'],
            ['key' => 'site_description', 'value' => 'This is a list of various filiations - from restaurants to universities. Here you can find anything!'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
