<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=0;
        while($i<10):
            DB::table('products')->insert(
                [
                    'product_name' => 'buku',
                    'type' => 'Barang Baku',
                    'quantity' => 0,
                    'unit' => 'pcs',
                    'price' => 5000,
                    'created_at' => '2021-03-04',
                ]
            );
            $i++;
        endwhile;
    }
}
