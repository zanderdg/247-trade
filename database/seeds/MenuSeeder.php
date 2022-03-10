<?php

use Illuminate\Database\Seeder;
use App\MenuLink;

class MenuSeeder extends Seeder
{

    protected $menu;

    public function __construct(MenuLink $menu)
    {
        $this->menu = $menu;
    }

    public function run()
    {
        $this->menu->truncate();

        $this->menu->create([
            'name'              => 'About Us',
            'page_id'           => 1,
            'other_url'         => '',
            'menu_location'     => 0,
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->menu->create([
            'name'              => 'Careers',
            'page_id'           => 2,
            'other_url'         => '',
            'menu_location'     => 0,
            'status'            => 1,
            'order'             => 1,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->menu->create([
            'name'              => 'Contact',
            'page_id'           => 3,
            'other_url'         => '',
            'menu_location'     => 0,
            'status'            => 1,
            'order'             => 2,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->menu->create([
            'name'              => 'Our Locations',
            'page_id'           => 4,
            'other_url'         => '',
            'menu_location'     => 0,
            'status'            => 1,
            'order'             => 3,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

        $this->menu->create([
            'name'              => 'Terms & Conditions',
            'page_id'           => 9,
            'other_url'         => '',
            'menu_location'     => 2,
            'status'            => 1,
            'order'             => 0,
            'created_by'        => 1,
            'created_at'        => date('Y-m-d h:i:s'),
            'updated_at'        => date('Y-m-d h:i:s'),
        ]);

    }
}