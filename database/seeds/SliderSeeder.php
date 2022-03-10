<?php
use Illuminate\Database\Seeder;
class SliderSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->truncate();
        // Creating array that contain all the user table fields and assigning the default vaules.
        $slides  =  [
            [
                'business_unit_id'   => 1,
                'title'              => 'Slide 1',
                'content'            => '<p>No one can really see the <strong>Future.</strong> <br> We, at least, can tell you <strong>What really happened in the past.</strong></p>',
                'slider_image'       => 'forensic.jpg',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'business_unit_id'   => 1,
                'title'              => 'Slide 2',
                'content'            => '<p>No one can really see the <strong>Future.</strong> <br> We, at least, can tell you <strong>What really happened in the past.</strong></p>',
                'slider_image'       => 'forensic.jpg',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'business_unit_id'   => 1,
                'title'              => 'Slide 3',
                'content'            => '<p>No one can really see the <strong>Future.</strong> <br> We, at least, can tell you <strong>What really happened in the past.</strong></p>',
                'slider_image'       => 'forensic.jpg',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'business_unit_id'   => 1,
                'title'              => 'Slide 4',
                'content'            => '<p>No one can really see the <strong>Future.</strong> <br> We, at least, can tell you <strong>What really happened in the past.</strong></p>',
                'slider_image'       => 'forensic.jpg',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'business_unit_id'   => 2,
                'title'              => 'Slide 1',
                'content'            => '<p>Because the guys that designed the <strong>Hindenburg, the Titanic</strong> and <strong>the Edsel</strong> all thought they had nailed it too.</p>',
                'slider_image'       => 'testing-design-1.jpg',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'business_unit_id'   => 2,
                'title'              => 'Slide 2',
                'content'            => '<p>Because the guys that designed the <strong>Hindenburg, the Titanic</strong> and <strong>the Edsel</strong> all thought they had nailed it too.</p>',
                'slider_image'       => 'testing-design-1.jpg',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'business_unit_id'   => 2,
                'title'              => 'Slide 3',
                'content'            => '<p>Because the guys that designed the <strong>Hindenburg, the Titanic</strong> and <strong>the Edsel</strong> all thought they had nailed it too.</p>',
                'slider_image'       => 'testing-design-1.jpg',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'business_unit_id'   => 2,
                'title'              => 'Slide 4',
                'content'            => '<p>Because the guys that designed the <strong>Hindenburg, the Titanic</strong> and <strong>the Edsel</strong> all thought they had nailed it too.</p>',
                'slider_image'       => 'testing-design-1.jpg',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'business_unit_id'   => 3,
                'title'              => 'Slide 1',
                'content'            => '<p>To us, the only thing more beautiful than <br> candlelight is <strong>CANDLELIGHT SAFETY.</strong></p>',
                'slider_image'       => 'consumer-products.jpg',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'business_unit_id'   => 3,
                'title'              => 'Slide 2',
                'content'            => '<p>To us, the only thing more beautiful than <br> candlelight is <strong>CANDLELIGHT SAFETY.</strong></p>',
                'slider_image'       => 'consumer-products.jpg',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'business_unit_id'   => 3,
                'title'              => 'Slide 3',
                'content'            => '<p>To us, the only thing more beautiful than <br> candlelight is <strong>CANDLELIGHT SAFETY.</strong></p>',
                'slider_image'       => 'consumer-products.jpg',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],
            [
                'business_unit_id'   => 3,
                'title'              => 'Slide 4',
                'content'            => '<p>To us, the only thing more beautiful than <br> candlelight is <strong>CANDLELIGHT SAFETY.</strong></p>',
                'slider_image'       => 'consumer-products.jpg',
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s')
            ],

        ];


        //      Inserting the default values into database.
        DB::table('sliders')->insert($slides);
    }

}