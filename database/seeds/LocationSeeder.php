<?php
use Illuminate\Database\Seeder;
class LocationSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->truncate();
        // Creating array that contain all the user table fields and assigning the default vaules.
        $location_data  =  [
            [
                'name'              => 'Columbus',
                'address'           => '7349 Worthington-Galena Road Columbus, OH 43085',
                'toll_free'         => '(223)-121-1124',
                'telephone'         => '(223)-121-1124',
                'fax'               => '(223)-121-1124',
                'professional'      => 1,
                'image'             => 'location-2.jpg',
                'status'            => 1,
                'order'             => 0,
                'created_by'        => 1,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'name'              => 'Chicago',
                'address'           => '7349 Worthington-Galena Road Chicago, IL 43085',
                'toll_free'         => '(666)-121-1124',
                'telephone'         => '(666)-121-1124',
                'fax'               => '(666)-121-1124',
                'professional'      => 1,
                'image'             => 'location-3.jpg',
                'status'            => 1,
                'order'             => 0,
                'created_by'        => 1,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],

        ];


        // Inserting the default values into database.
        DB::table('locations')->insert($location_data);
    }

}