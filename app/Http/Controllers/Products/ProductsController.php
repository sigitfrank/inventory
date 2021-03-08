<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    protected $sidebar_parents;
    protected $sidebar_children;
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
            return redirect(route('products.index'))->with('status', 'Product added succesfully')->with('status', true);
        }
        return redirect(route('products.index'))->with('status', 'Product failed to add')->with('status', false);
    }


    public function show(Product $product)
    {
    }

    public function edit(Product $product)
    {
    }

    public function update(Request $request, Product $product)
    {
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
