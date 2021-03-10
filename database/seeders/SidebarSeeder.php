<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SidebarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sidebars')->insert(
            [
                'nama_module' => 'Create',
                'parent_module' => 9,
                'has_child' => 0,
                'icon' => '',
                'path' => 'modules/create',
            ]
        );
    }
}
