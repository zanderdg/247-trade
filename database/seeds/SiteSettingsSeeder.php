<?php

use Illuminate\Database\Seeder;
use App\SiteSetting;

class SiteSettingsSeeder extends Seeder
{

    protected $site_setting;

    public function __construct(SiteSetting $site_setting)
    {
        $this->site_setting = $site_setting;
    }

    public function run()
    {
        $this->site_setting->truncate();
        $this->site_setting->create([
            'site_title'                    => 'Sea Limited',
            'site_email'                    => 'info@sealimited.com',
            'meta_keywords'                 => '',
            'meta_description'              => '',
            'google_analytics'              => '',
            'copyright'               		=> '&copy 2015 SEA, Ltd. All Rights Reserved.',
            'linkedin'                      => 'https://www.linkedin.com/',
            'youtube'                       => 'https://www.youtube.com/',
            'created_at'                    => date('Y-m-d h:i:s'),
            'updated_at'                    => date('Y-m-d h:i:s'),
        ]);
    }
}