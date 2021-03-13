<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function updateProductAfterTransaction($data){
        
        $product_data = $data->product_name;
        $product_id = explode('-', $product_data)[0];
        $product_name = explode('-', $product_data)[1];
        $user_id = explode('-', $product_data)[2];
        $unit = $data->unit;
        $user_id = $data->user_id;
        $get_current_product = Product::find($product_id);
        $quantity = $get_current_product->quantity;
        $price = $get_current_product->price;
        if($data->type == 'Pembelian'){
            $quantity = $quantity + $data->quantity;
            $price = ($price + $data->price)/2;
            
            $update_product = DB::table('products')
            ->where('product_name', $product_name)
            ->where('unit', $unit)
            ->where('user_id', $user_id)
            ->update([
                    'quantity'=>$quantity,
                    'price'=>$price
                ]);

            if($update_product){
                return true;
            }
            return false;
        }
        if($data->type == 'Penjualan'){
            $quantity = $quantity - $data->quantity;
            $update_product = DB::table('products')
            ->where('product_name', $product_name)
            ->where('unit', $unit)
            ->where('user_id', $user_id)
            ->update([
                    'quantity'=>$quantity,
                    'price'=>$data->price
                ]);
            if($update_product){
                return true;
            }
            return false;
        }

    }

    public function checkProduct($data){
        $product_name = $data->product_name;
        $user_id = $data->user_id;
        $unit = $data->unit;

        $current_product = DB::table('unit_products')
        ->where('product_name', $product_name)
        ->where('user_id', $user_id)
        ->first();
        if($current_product){
        $current_unit = $current_product->unit;
        $update_unit = DB::table('unit_products')
            ->where('product_name', $product_name)
            ->where('user_id', $user_id)
            ->update([
                'unit'=>$current_unit.','.$data->unit
            ]);
            if($update_unit){
                return true;
            }
            return false;
        } else{
            $insert_unit = DB::table('unit_products')
            ->insert([
                'user_id'=>$user_id,
                'product_name'=>$product_name,
                'unit'=>$unit
            ]);
            if($insert_unit){
                return true;
            }
            return false;
        }
    }
}
