<?php
use Illuminate\Database\Seeder;
class NewsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->truncate();
        // Creating array that contain all the user table fields and assigning the default vaules.
        $location_data  =  [
            [
                'user_id'           => 1,
                'type'              => 'events',
                'business_unit_id'  => 1,
                'title'             => 'Sea Limited New Research Campus',
                'content'           => '<p>Automotive Testing Technology International describes vehicle-related additions to S-E-A’s new headquarters. An asphalt vehicle test pad, off-road vehicle course, earthen hill, rollover test pits, and a longer sled facility will enable S-E-A to offer a multitude of vehicle tests from the comfort of its own property.</p>',
                'image'             => 'news-1.jpg',
                'video'             => '',
                'slug'              => 'new-research-campus',
                'status'            => 1,
                'order'             => 0,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'user_id'           => 1,
                'type'              => 'news',
                'business_unit_id'  => 2,
                'title'             => 'Sea Limited New Research Campus 2',
                'content'           => '<p>Automotive Testing Technology International describes vehicle-related additions to S-E-A’s new headquarters. An asphalt vehicle test pad, off-road vehicle course, earthen hill, rollover test pits, and a longer sled facility will enable S-E-A to offer a multitude of vehicle tests from the comfort of its own property.</p>',
                'image'             => 'news-1.jpg',
                'video'             => '',
                'slug'              => 'new-research-campus-2',
                'status'            => 1,
                'order'             => 0,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'user_id'           => 1,
                'type'              => 'articles',
                'business_unit_id'  => 3,
                'title'             => 'Sea Limited New Research Campus 3',
                'content'           => '<p>Automotive Testing Technology International describes vehicle-related additions to S-E-A’s new headquarters. An asphalt vehicle test pad, off-road vehicle course, earthen hill, rollover test pits, and a longer sled facility will enable S-E-A to offer a multitude of vehicle tests from the comfort of its own property.</p>',
                'image'             => 'news-1.jpg',
                'video'             => '',
                'slug'              => 'new-research-campus-3',
                'status'            => 1,
                'order'             => 0,
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
        ];


        // Inserting the default values into database.
        DB::table('news')->insert($location_data);
    }

}