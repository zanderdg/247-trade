<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Settings and Theme options
        $settings = [
            ['option_name' => 'site_title', 'option_type' => 'configuration'],
            ['option_name' => 'site_url', 'option_type' => 'configuration'],
            ['option_name' => 'site_phone', 'option_type' => 'configuration'],
            ['option_name' => 'site_email', 'option_type' => 'configuration'],
            ['option_name' => 'meta_keywords', 'option_type' => 'configuration'],
            ['option_name' => 'meta_description', 'option_type' => 'configuration'],

            ['option_name' => 'site_logo', 'option_type' => 'theme_option'],
            ['option_name' => 'sender_email', 'option_type' => 'theme_option'],
            ['option_name' => 'contact_email', 'option_type' => 'theme_option'],
            ['option_name' => 'google_analytics_status', 'option_type' => 'theme_option'],
            ['option_name' => 'google_analytics_code', 'option_type' => 'theme_option'],
            ['option_name' => 'copyright_text', 'option_type' => 'theme_option'],
            ['option_name' => 'html_head_block', 'option_type' => 'theme_option'],
        ];

        foreach ($settings as $key => $setting) {
            $db_setting = DB::table('settings')->where('option_name', $setting['option_name'])->first();

            if(!$db_setting) {
                $setting['created_at'] = Carbon::now();
                $setting['updated_at'] = Carbon::now();

                DB::table('settings')->insert($setting);
            }
        }
    }
}
