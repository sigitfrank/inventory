<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->user = $this->getUserData();
    }
    public function index()
    {
        $products = Product::all();
        $data_view = [
            'page' => 'products.index',
            'data' => $products
        ];
        return $this->getView($data_view);
    }


    public function create()
    {
        $data_view = [
            'page' => 'products.create',
        ];
        return $this->getView($data_view);
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
            'price' => 'required'
        ]);
        $isProductAdded = Product::create($request->all());
        if ($isProductAdded) {
            return redirect(route('products'))->with('alert', 'Product added succesfully')->with('status', true);
        }
        return redirect(route('products'))->with('alert', 'Product failed to add')->with('status', false);
    }


    public function show(Product $product)
    {
    }

    public function edit(Product $product)
    {
        $data_view = [
            'page' => 'products.edit',
            'data' => $product
        ];
        return $this->getView($data_view);
    }

    public function update(Request $request, Product $product)
    {
        $id_product = $product->id;
        $request->validate([
            'product_name' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
            'price' => 'required'
        ]);

        $is_product_updated = Product::where('id', $id_product)
        ->update(
            [
                'product_name' => $request->product_name,
                'type' => $request->type,
                'quantity' => $request->quantity,
                'unit' => $request->unit,
                'price' => $request->price,
            ]
        );
        if ($is_product_updated) {
            return redirect(route('products'))->with('alert', 'Product updated succesfully')->with('status', true);
        }
        return redirect(route('products'))->with('alert', 'Product failed to update')->with('status', false);
        
    }

    public function destroy(Product $product)
    {
        $is_product_deleted = Product::destroy($product->id);
        if ($is_product_deleted) {
            return  json_encode(
                [
                    'icon'=>'success',
                    'title'=> 'Delete',
                    'message'=>'Product deleted successfully',
                ]
            );
        }
        return  json_encode(
            [
                'icon'=>'error',
                'title'=> 'Delete',
                'message'=>'Product failed to delete',
            ]
        );
    }
}
