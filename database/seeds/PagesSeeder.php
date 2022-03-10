<?php

use Illuminate\Database\Seeder;
use App\Page;

class PagesSeeder extends Seeder
{

    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function run()
    {
        $this->page->truncate();

        $this->page->create([
            'template'          => 'about-us',
            'title'             => 'About Us',
            'short_title'       => 'About Us',
            'content'           => '<p>S-E-A, Ltd. is a recognized worldwide leader in forensic analysis, research and testing. A full-time, court-qualified staff provides a wide range of services to reveal the cause of failures—or to mitigate the risk of them happening in the first place. Biomechanical, civil, electrical, material and mechanical engineers, fire <br> investigators, chemists and industrial hygienists interact in a multi-disciplined environment to provide thorough and independent analyses.</p><h3><span>The S-E-A Difference</span></h3><p>Since its inception in 1970, S-E-A has continued to grow each and every year. Our accumulation of experience and expertise coupled with access to the latest technology—some of which we created and developed ourselves—have made our staff and facilities among the most sophisticated in the world.</p><p>From our Research Center to our full-service chemical laboratory; from our Roll Simulator to 3D laser scanners —our professionals have the technologies they require in order to reveal the cause of some of the most complex failures imaginable.</p><p>With 11 offices, a research center and over two-hundred professionals, S-E-A is able to provide immediate response to our clients needs regardless of location. Contact S-E-A at <strong>800-782-6851</strong> or via the website under Contact Us or Submit an Assignment.</p>',
            'image'             => 'about-banner.jpg',
            'meta_title'        => '',
            'meta_keywords'     => '',
            'meta_description'  => '',
            'slug'              => 'about-us',
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->page->create([
            'template'          => 'careers',
            'title'             => 'Careers',
            'short_title'       => 'Careers',
            'content'           => '<p>At S-E-A our associates are our most valued assets. Our unique investigation services culture encourages the sharing of ideas and recognizes that everyone contributes value. We strive to recruit and retain the brightest people and continually look for talented candidates to satisfy our growing needs. We offer associates challenging careers in an intellectually stimulating environment. </p><h3><span>The S-E-A Difference</span></h3><p>S-E-A associates enjoy competitive salaries, bonus opportunities, continuous professional development and a comprehensive benefits package. <br>Company benefits may include:</p><div class="row"><div class="col-md-12"><ul class="h-list clearfix"><li><span>401(k) retirement plan with company match</span></li><li><span>Medical, dental and vision coverage</span></li><li><span>Section 125 Flexible Spending Account Plans</span></li><li><span>Company paid short-term disability</span></li><li><span>Tution Reimbursement</span></li><li><span>Company paid life and AD&amp;D insurance</span></li><li><span>Company paid long-term disability</span></li></ul></div></div>',
            'image'             => 'career-banner.jpg',
            'meta_title'        => '',
            'meta_keywords'     => '',
            'meta_description'  => '',
            'slug'              => 'careers',
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->page->create([
            'template'          => 'contact',
            'title'             => 'Contact',
            'short_title'       => 'Contact',
            'content'           => '<div class="col-md-6"><p>Please feel free to contact us with any questions. If you are interested in job opportunities with S-E-A, please see our Career Page for details on how to submit your application and resume. If you are looking to contact a specific S-E-A consultant, please see our Professionals page for the directory of all our technical staff.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</p></div><div class="col-md-6"><div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34518.90509634356!2d-83.00437375749968!3d40.1184661168126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8838f35f39942a91%3A0x4f167d8da44b2236!2sS-E-A+Limited!5e0!3m2!1sen!2s!4v1448374154239" width="100%" height="314" frameborder="0" style="border:0" allowfullscreen></iframe></div></div>',
            'image'             => 'contact-banner.jpg',
            'meta_title'        => '',
            'meta_keywords'     => '',
            'meta_description'  => '',
            'slug'              => 'contact',
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->page->create([
            'template'          => 'locations',
            'title'             => 'Locations',
            'short_title'       => 'Our Locations',
            'content'           => '<div class="col-md-6"><p>Please feel free to contact us with any questions. If you are interested in job opportunities with S-E-A, please see our Career Page for details on how to submit your application and resume. If you are looking to contact a specific S-E-A consultant, please see our Professionals page for the directory of all our technical staff.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</p></div><div class="col-md-6"><div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34518.90509634356!2d-83.00437375749968!3d40.1184661168126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8838f35f39942a91%3A0x4f167d8da44b2236!2sS-E-A+Limited!5e0!3m2!1sen!2s!4v1448374154239" width="100%" height="314" frameborder="0" style="border:0" allowfullscreen></iframe></div></div>',
            'image'             => 'location-banner.jpg',
            'meta_title'        => '',
            'meta_keywords'     => '',
            'meta_description'  => '',
            'slug'              => 'locations',
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->page->create([
            'template'          => 'professional',
            'title'             => 'Find a Professional',
            'short_title'       => 'Find a Professional',
            'content'           => '',
            'image'             => 'professional-banner.jpg',
            'meta_title'        => '',
            'meta_keywords'     => '',
            'meta_description'  => '',
            'slug'              => 'find-a-professional',
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->page->create([
            'template'          => 'news-events',
            'title'             => 'News & Events',
            'short_title'       => 'News & Events',
            'content'           => '',
            'image'             => 'news-banner.jpg',
            'meta_title'        => '',
            'meta_keywords'     => '',
            'meta_description'  => '',
            'slug'              => 'news-events',
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->page->create([
            'template'          => 'case-studies',
            'title'             => 'Case Studies',
            'short_title'       => 'Case Studies',
            'content'           => '',
            'image'             => 'cstudies-banner.jpg',
            'meta_title'        => '',
            'meta_keywords'     => '',
            'meta_description'  => '',
            'slug'              => 'case-studies',
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->page->create([
            'template'          => 'submit_assignment',
            'title'             => 'Submit an Assignment',
            'short_title'       => 'Submit an Assignment',
            'content'           => '',
            'image'             => 'assignment-banner.jpg',
            'meta_title'        => '',
            'meta_keywords'     => '',
            'meta_description'  => '',
            'slug'              => 'submit-an-assignment',
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->page->create([
            'template'          => 'default',
            'title'             => 'Terms & Condition',
            'short_title'       => 'Terms & Condition',
            'content'           => '',
            'image'             => 'about-banner.jpg',
            'meta_title'        => '',
            'meta_keywords'     => '',
            'meta_description'  => '',
            'slug'              => 'terms-and-condition',
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->page->create([
            'template'          => 'home',
            'title'             => 'Home',
            'short_title'       => 'home',
            'content'           => '',
            'image'             => '',
            'meta_title'        => '',
            'meta_keywords'     => '',
            'meta_description'  => '',
            'slug'              => 'home',
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);
    }
}