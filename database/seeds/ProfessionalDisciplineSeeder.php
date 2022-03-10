<?php
use Illuminate\Database\Seeder;
class ProfessionalDisciplineSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professional_discipline')->truncate();
        // Creating array that contain all the user table fields and assigning the default vaules.
        $data  =  [
            [
                'id'            => 1,
                'name'          => 'Business Development',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 3,
                'name'          => 'Candle Lab',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 4,
                'name'          => 'Chemical Lab',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 6,
                'name'          => 'Civil/Structural Engineer',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 7,
                'name'          => 'Corporate Development',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 9,
                'name'          => 'Electrical Engineer',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 10,
                'name'          => 'Evidence Technician',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 11,
                'name'          => 'Fire Investigator',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 12,
                'name'          => 'Human Resources',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 13,
                'name'          => 'Industrial Hygiene/Environmental',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 15,
                'name'          => 'Fire Protection Engineer',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 17,
                'name'          => 'Manager',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 18,
                'name'          => 'Maritime Consulting',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 19,
                'name'          => 'Materials/Metallurgy',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 20,
                'name'          => 'Biomechanics',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 21,
                'name'          => 'Mechanical Engineer',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 25,
                'name'          => 'Office Manager',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 26,
                'name'          => 'Researcher',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 28,
                'name'          => 'Technician',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 30,
                'name'          => 'Medical Illustration',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 46,
                'name'          => 'Geotechnical',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 48,
                'name'          => 'Visualization Services',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 49,
                'name'          => 'Architect',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 51,
                'name'          => 'Recruiter',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 52,
                'name'          => 'Biomedical',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 53,
                'name'          => 'Software Engineer',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 54,
                'name'          => 'Construction Safety and Health Consultant',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 55,
                'name'          => 'Information Technology',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 57,
                'name'          => 'Marine Engineer',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 58,
                'name'          => 'Occupational Safety and Health Consultant',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
        ];


        //      Inserting the default values into database.
        DB::table('professional_discipline')->insert($data);
    }

}