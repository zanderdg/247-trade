<?php
use Illuminate\Database\Seeder;
class CapabilitySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('capabilities')->truncate();

        DB::table('capabilities')->insert([
            'title'              => 'Biomechanical / Biomedical',
            'business_unit_id'   => 1,
            'content'            => '<p><i>The most devastating accidents are often those involving fatalities or injuries. In the emotional aftermath of accidents like these, the facts can be as seriously compromised as the victims.</i></p><p>S-E-A\'s biomechanical engineers have the formal education, training and experience to bridge the gap between engineering and medicine to analyze the effects of applied forces and motion on the human body.</p><p>They employ an array of analytical techniques, simulations and tests to identify the physical injury factors present during a particular event so as to determine whether the alleged injuries are consistent with the accident.</p>',
            'image'             => 'bio-banner.jpg',
            'brochure'          => '',
            'portfolio'         => '',
            'slug'              => 'biomechanical-biomedical',
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
            'related_service'   => '<ul><li><a href="javascript:;">Anthropomorphic Test Device (ATD)</a></li><li><a href="javascript:;">Seat belt use/non-use</a></li><li>Construction Accidents</li><li>Slip/Trip and Fall Analysis</li><li>Human Factors</li><li>Soft-tissue injuries</li><li>Industrial/workplace accident injuries</li><li><a href="javascript:;">Sports injuries and protective equipment</a></li><li>Injuries caused by minor vehicle collisions</li><li><a href="javascript:;">Vehicle Accident Reconstruction</a></li><li>Medical devices</li><li><a href="javascript:;">Biomechanical Sports Evaluation</a></li><li><a href="javascript:;">Occupant/operator safety device effectiveness (helmets, seat belts, airbags, etc.)</a></li><li><a href="javascript:;">Roll Simulator / Occupant Restraint Testing</a></li><li>Pedestrian accidents</li><li><a href="javascript:;">Roll Simulator / Occupant  Restraint Testing</a></li><li>Perception/reaction times</li><li><a href="javascript:;">Unique Client-Driven Testing</a></li><li>Product Liability</li></ul>',
            'video'             => '',
        ]);
    }

}