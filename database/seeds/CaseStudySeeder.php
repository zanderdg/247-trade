<?php
use Illuminate\Database\Seeder;
class CaseStudySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('case_studies')->truncate();

        DB::table('case_studies')->insert([
            'name'              => 'Roller Coaster',
            'image'             => 'casestudy-img.jpg',
            'is_featured'       => 1,
            'professional_id'   => 1,
            'content'           => '<h4>When there’s an accident on a huge wooden roller coaster, are the classic materials or the design at fault?</h4><p>With the large scale of premier roller coasters and the speeds at which they operate, steel comes to mind as the material of choice for construction. But to coaster enthusiasts, the sound and the rough ride of a wooden coaster makes it authentic. An accident on a well-known roller coaster brought the use of wood into question and S-E-A was asked by the state to investigate and evaluate the coaster’s design, construction and the wood itself to find an answer for why the popular ride had failed while in use.</p><h3><span>Case Study – Roller Coaster Failure</span></h3><p>The roller coaster had originally been built from a design by a legendary German ride engineer and designer. Over the years, the huge structure’s tendency to sway had become a concern. A secondary design had proposed stiffening the structure using cables attached to a central point.</p><p>While these modifications increased the overall stability of the coaster, they changed the distribution of force and torque on parts of the structure.</p><p>When some of the wooden supports split around the bolts which connected them, the track carrying the trains of cars dropped out of alignment suddenly, causing an accident as the cars passed over.</p>',
            'assigned_task'     => '<h4>S-E-A was asked by the state to study and evaluate the condition of the wooden materials in use, the design and its secondary modifications in order to reveal the cause of the accident.</h4><p>To perform the analysis, S-E-A took the following steps:</p><ul><li><span>Review all available plans and specifications.</span></li><li><span>Examine and photograph the structure and the damaged sections for analysis.</span></li><li><span>Test sections of the wooden braces for weakness due to weathering and/or other factors.</span></li><li><span>Evaluate engineering drawings, perform calculations of the forces involved, determine how they were being distributed and identify which elements were bearing the load.</span></li><li><span>Combine the collected information to evaluate both the design and the materials used.</span></li><li><span>Evaluate the feasibility of repairs and safe usage of the ride going forward.</span></li></ul>',
            'assigned_task_2'   => '<h3><span>Test evidence was evaluated resulting in the following findings:<span></h3><ul><li><span>S-E-A’s investigation showed that the southern pine used in the ride’s construction was an appropriate material for the construction of the ride.</span></li><li><span>The wood was determined to be in good condition at the time of the accident.</span></li><li><span>The structural failure was due to a pre-existing design deficiency revealed through the secondary modifications to parts of the structure.</span></li><li><span>The secondary modifications re-directed and concentrated forces on a smaller number of joists, causing the wood to split around the bolts holding them.</span></li><li><span>The newly concentrated forces were still below what the structure could have tolerated had design deficiencies not existed.</span></li><li><span>The broken braces ultimately resulted in the failure of the structure above them.</span></li></ul><p>S-E-A’s ability to accurately evaluate and recreate accidents relies to some degree on expertise using and combining a broad range of advanced technologies. More importantly, S-E-A engineers operate in specialized multi-disciplinary teams with the deep understanding garnered from extensive field experience within their specialties</p><p>S-E-A’s multi-disciplinary teams are a large part of the reason why we have been able to help so many clients. Our scientific methodologies cross all disciplines and our wealth of experience solving a wide range of problems is invaluable in assuring broad perspective and thinking unfettered by familiarity and repetition.</p>',
            'slug'              => 'roller-coaster',
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);
    }

}