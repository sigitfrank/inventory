@extends('layouts.dashboard')

@section('content')
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
        
        @include('layouts.header')

        @include('layouts.sidebar')

         <main class="mdl-layout__content mdl-color--grey-100">
             <div class="row">
                 <div class="col-md-12">
                     <h1 class="m-3">Add Transactions</h1>
                     <hr>
                 </div>
             </div>
             <div class="row justify-content-center">
                 <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-body">
                              <form action="{{route('transactions/store')}}" class="form" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <select class="form-control" id="product_name" name="product_id">
                                        <option>-</option>
                                        @foreach ($data as $product) 
                                            <option value="{{$product->id}}">{{ $product->product_name }}</option>
                                         @endforeach;
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control" id="type" name="type">
                                        <option>-</option>
                                        <option>Pembelian</option>
                                        <option>Penjualan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="quantity...">
                                </div>
                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <input type="text" class="form-control" id="unit" name="unit" placeholder="unit...">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="price...">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-dark btn-lg">Add Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
             </div>  
        </main>
    </div>
@stop
