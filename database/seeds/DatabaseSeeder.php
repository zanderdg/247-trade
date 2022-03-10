<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('AdminSeeder');
        $this->call('SettingsTableSeeder');
        $this->call('BusinessUnitsSeeder');
        $this->call('SiteSettingsSeeder');
        $this->call('ForensicLitigationSeeder');
        $this->call('PagesSeeder');
        $this->call('MenuSeeder');
        $this->call('ProfessionalSeeder');
        $this->call('SliderSeeder');
        $this->call('TestingDesignSeeder');
        $this->call('ConsumerProductSeeder');
        $this->call('SliderSeeder');
        $this->call('LocationSeeder');
        $this->call('CaseStudySeeder');
        $this->call('CapabilitySeeder');
        $this->call('NewsSeeder');
        $this->call('ProfessionalDisciplineSeeder');
        $this->call('ProfessionalExpertiseSeeder');
        $this->command->info('Admin User created with username admin@admin.com and password admin0101');

        Model::reguard();
    }
}
