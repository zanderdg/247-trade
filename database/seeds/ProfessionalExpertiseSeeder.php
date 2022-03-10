<?php
use Illuminate\Database\Seeder;
class ProfessionalExpertiseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professional_expertise')->truncate();
        // Creating array that contain all the user table fields and assigning the default vaules.
        $data  =  [
            [
                'id'            => 1,
                'name'          => 'Biomechanical/Biomedical',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 2,
                'name'          => 'Bridge Evaluation',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 3,
                'name'          => 'Candle Testing',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 4,
                'name'          => 'Civil/Structural',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 5,
                'name'          => 'Construction Safety',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 6,
                'name'          => 'Electrical',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 7,
                'name'          => 'Environmental/Occupational Health &amp; Safety',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 8,
                'name'          => 'Fire and Explosion Investigation',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 9,
                'name'          => 'Fire Protection',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 10,
                'name'          => 'Gas Systems',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 11,
                'name'          => 'Geotechnical/Soils',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 12,
                'name'          => 'Graphics',
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
                'id'            => 14,
                'name'          => 'Laboratory Testing',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 15,
                'name'          => 'Maintenance of Traffic',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 16,
                'name'          => 'Marine &amp; Energy Investigations',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 17,
                'name'          => 'Maritime',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 18,
                'name'          => 'Material Failure/Metallurgical Analysis',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 19,
                'name'          => 'Mechanical',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 20,
                'name'          => 'Medical Illustrator',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 21,
                'name'          => 'Models',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 22,
                'name'          => 'Premises Liability Evaluations',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 23,
                'name'          => 'Product Failure and Liability Analysis',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 24,
                'name'          => 'Storm Damage Evaluation',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 25,
                'name'          => 'Technician',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 26,
                'name'          => 'Trucking and Heavy Equipment Investigations',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 27,
                'name'          => 'Vehicle Dynamics',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 28,
                'name'          => 'Vehicular Accident Reconstruction',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 29,
                'name'          => 'Animations',
                'status'        => 1,
                'created_by'    => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
        ];


        //      Inserting the default values into database.
        DB::table('professional_expertise')->insert($data);
    }

}