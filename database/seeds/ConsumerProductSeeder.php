<?php
use Illuminate\Database\Seeder;
class ConsumerProductSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consumer_products')->truncate();
        // Creating array that contain all the user table fields and assigning the default vaules.
        $consumer_product_data  =  [
            [
                'featured_image' => 'consumer.jpg',
                'featured_title' => 'Consumer Products',
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
                'box_image'      => 'consumer-1.jpg',
                'box_text'       => 'Candles / Fragrance Analysis',
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
                'box_image'      => 'consumer-2.jpg',
                'box_text'       => 'Electrical Products',
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
                'box_image'      => 'consumer-3.jpg',
                'box_text'       => 'Chemical  Labortary',
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
                'box_image'      => 'consumer-4.jpg',
                'box_text'       => 'Client - Specific  Testing',
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
                'box_image'      => 'consumer-5.jpg',
                'box_text'       => 'Vessel',
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
                'box_image'      => 'consumer-6.jpg',
                'box_text'       => 'QA / QC',
                'box_link'       => 'http://www.google.com',
                'box_order'      => 7,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'featured_image' => '',
                'featured_title' => '',
                'featured_link'  => '',
                'box_image'      => '',
                'box_text'       => 'Flammability',
                'box_link'       => '',
                'box_order'      => 8,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],
            [
                'featured_image' => '',
                'featured_title' => '',
                'featured_link'  => '',
                'box_image'      => 'consumer-7.jpg',
                'box_text'       => 'Automotive',
                'box_link'       => 'http://www.google.com',
                'box_order'      => 9,
                'created_by'     => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ],

        ];


        //      Inserting the default values into database.
        DB::table('consumer_products')->insert($consumer_product_data);
    }

}