<?php

use Illuminate\Database\Seeder;
use App\ForensicLitigation;

class ForensicLitigationSeeder extends Seeder
{

    protected $forensics_litigation;

    public function __construct(ForensicLitigation $forensics_litigation)
    {
        $this->forensics_litigation = $forensics_litigation;
    }

    public function run()
    {
        $this->forensics_litigation->truncate();
        $this->forensics_litigation->create([
            'featured_image' 	=> 'forensic-logics.jpg',
            'featured_title'	=> 'Forensics & Litigation',
            'featured_link'		=> '/forensics-and-litigation',
            'capability_text'   => '<h2>Featured Capabilities</h2><p>Below is a small sample of the broad range of capabilities offered by S-E-A to our clients.  Please click on an image to discover how each of the services may be useful to you and your clients. <a href="javascript:;" class="readMore">more+</a></p>',
            'capability_more'	=> '<p>Below is a small sample of the broad range of capabilities offered by S-E-A to our clients.  Please click on an image to discover how each of the services may be useful to you and your clients.</p>',
            'case_study_text'   => '<h2>Featured Case Studies</h2><p>Here is a selection of projects and studies recently completed by our <br>offices. Click on a photo to see a summary of the lessons learned as well as <br> the S-E-A capabilities and services rendered. <a href="javascript:;" class="readMore">more+</a></p>',
            'case_study_more'	=> '<p>Here is a selection of projects and studies recently completed by our <br>offices.  Click on a photo to see a summary of the lessons learned as well as <br> the S-E-A capabilities and services rendered.</p>',
            'brochure'          => '',
            'brochure_link'		=> '#',
            'created_by'		=> 1,
            'created_at'		=> date('Y-m-d h:i:s'),
            'updated_at'		=> date('Y-m-d h:i:s'),
        ]);
    }
}