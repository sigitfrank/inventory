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
        DB::table('sidebar')->insert(
            [
                'nama_module' => 'Create',
                'parent_module' => 5,
                'icon' => '',
                'path' => 'transactions.create',
            ]
        );
    }
}
