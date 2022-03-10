<?php
use Illuminate\Database\Seeder;
class TestingDesignSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testing_design')->truncate();
        // Creating array that contain all the user table fields and assigning the default vaules.
        $testing_design_data  =  [
            [
                'featured_image' => 'testing-design.jpg',
                'featured_title' => 'Testing Design',
                'featured_link'  => '',
                'box_image'      => '',
                'box_text'       => 'Bios',
                'box_link'       => '',
                'box_order'      => 1,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'featured_image' => '',
                'featured_title' => '',
                'featured_link'  => '',
                'box_image'      => 'vehicle-dayanamic.jpg',
                'box_text'       => 'Vehicle Dynamics',
                'box_link'       => 'http://www.google.com',
                'box_order'      => 2,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'featured_image' => '',
                'featured_title' => '',
                'featured_link'  => '',
                'box_image'      => 'biomechemnics.jpg',
                'box_text'       => 'Biomechemnics',
                'box_link'       => 'http://www.google.com',
                'box_order'      => 3,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'featured_image' => '',
                'featured_title' => '',
                'featured_link'  => '',
                'box_image'      => 'vehicle-cg.jpg',
                'box_text'       => 'Vehicle CG & <br> Moments of Inertia',
                'box_link'       => '',
                'box_order'      => 4,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'featured_image' => '',
                'featured_title' => '',
                'featured_link'  => '',
                'box_image'      => '',
                'box_text'       => 'Custom Testing Solutions',
                'box_link'       => '',
                'box_order'      => 5,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'featured_image' => '',
                'featured_title' => '',
                'featured_link'  => '',
                'box_image'      => 'on-off-highway.jpg',
                'box_text'       => 'On & Off Highway <br> Vehicle Testing',
                'box_link'       => '',
                'box_order'      => 6,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'featured_image' => '',
                'featured_title' => '',
                'featured_link'  => '',
                'box_image'      => 'vehicle-suspension.jpg',
                'box_text'       => 'Vehicle <br> Suspension Paremeters',
                'box_link'       => '',
                'box_order'      => 7,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'featured_image' => '',
                'featured_title' => '',
                'featured_link'  => '',
                'box_image'      => 'crash-testing.jpg',
                'box_text'       => 'Crash Testing <br> Video',
                'box_link'       => 'http://www.google.com',
                'box_order'      => 8,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'featured_image' => '',
                'featured_title' => '',
                'featured_link'  => '',
                'box_image'      => 'occupant-safety.jpg',
                'box_text'       => 'Occupant Safety <br> & Restraints',
                'box_link'       => 'http://www.google.com',
                'box_order'      => 9,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'featured_image' => '',
                'featured_title' => '',
                'featured_link'  => '',
                'box_image'      => '',
                'box_text'       => 'Standard & Regulatory <br> Tests',
                'box_link'       => 'http://www.google.com',
                'box_order'      => 10,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],

        ];


        //      Inserting the default values into database.
        DB::table('testing_design')->insert($testing_design_data);
    }

}