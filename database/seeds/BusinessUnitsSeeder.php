<?php

use Illuminate\Database\Seeder;

class BusinessUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_units')->truncate();
        
        DB::table('business_units')->insert([
            'name' => 'Forensics & Litigation',
        ]);
        DB::table('business_units')->insert([
            'name' => 'Testing & Design',
        ]);
        DB::table('business_units')->insert([
            'name' => 'Consumer Products',
        ]);
    }
}
