@extends('layouts.dashboard')

@section('content')
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
        
        @include('layouts.header')

        @include('layouts.sidebar')

         <main class="mdl-layout__content mdl-color--grey-100">
             <div class="row">
                 <div class="col-md-12">
                     <h1 class="m-3">Add Product</h1>
                     <hr>
                 </div>
             </div>
             <div class="row justify-content-center">
                 <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-body">
                              <form action="{{route('products.store')}}" class="form" method="post">
                                  @csrf
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" class="form-control" name="product_name"  value="{{ old('product_name') }}"  id="product_name" placeholder="product...">
                                    @error('product_name')
                                        <span class="text-color--secondary">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control" id="type" name="type">
                                        <option>-</option>
                                        <option>Bahan Baku</option>
                                        <option>Barang Jadi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" id="quantity"  value="{{ old('quantity') }}"  placeholder="quantity...">
                                     @error('quantity')
                                        <span class="text-color--secondary">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <input type="text" class="form-control" name="unit" id="unit"  value="{{ old('unit') }}"  placeholder="unit...">
                                     @error('unit')
                                        <span class="text-color--secondary">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="price...">
                                     @error('price')
                                        <span class="text-color--secondary">{{ $message }}</span>
                                    @enderror
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
