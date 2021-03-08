<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $i=0;
        while($i<10):
            DB::table('transactions')->insert(
                [
                    'product_id' => 1,
                    'user_id' => 1,
                    'date' => Carbon::now()->toDateTimeString(),
                    'type' => 'Pembelian',
                    'quantity' => 50,
                    'unit' => 'pcs',
                    'price' => 3000,
                ]
            );
        $i++;
        endwhile;
    }
}
