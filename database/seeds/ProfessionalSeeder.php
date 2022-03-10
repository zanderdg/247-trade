<?php

use Illuminate\Database\Seeder;

class ProfessionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professional')->truncate();
        
        DB::table('professional')->insert([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'degree_title' => 'BS',
            'content' => '<p>After receiving her Bachelor of Science degree in Exercise and Sport Science from Colorado State University, and a Master of Public Health from the Northwest Ohio Consortium for Public Health, Dr. Tara Amenson next attended Wayne State University. She received her Master of Science and Ph.D. in Biomedical Engineering from Wayne State University with a focus on impact biomechanics. Her dissertation research was on spinal injury causation and mitigation during motorsports crashes and involved the use of impact simulation software. Tara spent the next five years at the Transportation Research Center, Inc., where she was a contractor to the National Highway Traffic Safety Administration (NHTSA) Vehicle Research and Test Center (VRTC) in the biomechanics and crashworthiness divisions.</p>
<p>Tara is a Certified Safety Professional (CSP), an Associate Safety Professional (ASP), and an award winning author in the field of automotive safety engineering. She continues to be involved with motorsports safety research and is a member of the International Council of Motorsports Sciences. As a certified child passenger safety technician (CPST), Tara is specifically trained on the topic of child restraints and the safety of children in and around vehicles. Tara brought her diversified education and outstanding experience to S-E-A&rsquo;s Biomechanics Group in 2014. At S-E-A, Tara&rsquo;s focus is on accident investigation and analysis in an array of areas, including vehicular accidents, workplace safety, ergonomics, human factors, and product liability.</p>',
            'location_id' => 1,
            'company' => 'Cooperative Computing',
            'city' => 'Dallas',
            'state' => 'Tx',
            'zip' => '75400',
            'country' => 'USA',
            'address' => 'M1 m2 M3 Business',
            'email' => 'sameer.khan@cooperativecomputing.com',
            'telephone' => '(223)-121-1124',
            'toll_free' => '(223)-121-1124',
            'fax' => '(223)-121-1124',
            'facebook' => 'http://www.facebook.com',
            'twitter' => 'http://www.twitter.com',
            'linkedin' => 'http://www.linkedin.com',
            'profile_image' => 'profile-1.jpg',
            'status' => 1,
            'created_by' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
//Professional Discipline
        DB::table('professional_discipline')->truncate();
        DB::table('professional_discipline')->insert([
            'name' => 'Candle Lab Supervisor',
            'status' => 1,
            'created_by' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        DB::table('professional_discipline')->insert([
            'name' => 'Demonstrative Evidence',
            'status' => 1,
            'created_by' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
//Professional Expertise
        DB::table('professional_expertise')->truncate();
        DB::table('professional_expertise')->insert([
            'name' => 'Electrical Engineer',
            'status' => 1,
            'created_by' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        DB::table('professional_expertise')->insert([
            'name' => 'Mechanical Engineer',
            'status' => 1,
            'created_by' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
//User Capability
        DB::table('user_capability')->truncate();
        DB::table('user_capability')->insert([
            'professional_id' => 1,
            'capability_id' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
//User Expertise
        DB::table('user_expertise')->truncate();
        DB::table('user_expertise')->insert([
            'professional_id' => 1,
            'expertise_id' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        DB::table('user_expertise')->insert([
            'professional_id' => 1,
            'expertise_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
//User Discipline
        DB::table('user_discipline')->truncate();
        DB::table('user_discipline')->insert([
            'professional_id' => 1,
            'discipline_id' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
        DB::table('user_discipline')->insert([
            'professional_id' => 1,
            'discipline_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
    }
}
