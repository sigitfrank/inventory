<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getProductTransaction(){
        $transaction = DB::table('transactions')
            ->leftJoin('products', 'transactions.product_id', '=', 'products.id')
            ->select('transactions.*', 'products.product_name')
            ->get();
        return $transaction;
    }
}
