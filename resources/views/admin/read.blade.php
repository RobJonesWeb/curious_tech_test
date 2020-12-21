@extends('layouts.main')
@section('title', 'Home')
@section('content')
    <main id="container">
        <h2 class="p-3">Inventory <span class="d-lg-none">(<a href="/admin/products/create">+</a>)</span></h2>
        <div class="d-flex flex-wrap justify-content-around">
            @if(count($products) > 0)
            <table class="table table-hover table-bordered table-striped mx-3">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        @if($product["stock"] > 0)
                            <tr>
                                <th scope="row">{{$product["name"]}}</th>
                                <th scope="row">{{$product["stock"]}}</th>
                                <th scope="row">£{{$product["price"]}}</th>
                                <th scope="row" class="d-flex">
                                    <form method="GET" action="{{ route('products.edit', $product['id']) }}">
                                        <div class="form-group px-1">
                                            <input type="submit" class="btn btn-success edit-product"
                                                   value="Edit Product">
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('products.destroy', $product['id']) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="form-group px-1">
                                            <input type="submit" class="btn btn-danger"
                                                   onclick="return confirm('Are you sure you want to delete {{$product['name']}}?')"
                                                   value="Delete Product">
                                        </div>
                                    </form>
                                </th>
                            </tr>
                        @else
                            <tr class="bg-secondary text-light">
                                <th scope="row">{{$product["name"]}}</th>
                                <th scope="row">{{$product["stock"]}}</th>
                                <th scope="row">£{{$product["price"]}}</th>
                                <th scope="row" class="d-flex">
                                    <form method="GET" action="{{ route('products.edit', $product['id']) }}">
                                        <div class="form-group px-1">
                                            <input type="submit" class="btn btn-success edit-product"
                                                   value="Edit Product">
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('products.destroy', $product['id']) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="form-group px-1">
                                            <input type="submit" class="btn btn-danger"
                                                   onclick="return confirm('Are you sure you want to delete {{$product['name']}}?')"
                                                   value="Delete Product">
                                        </div>
                                    </form>
                                </th>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            @else
            <p>You haven't created any products, do you want to <a href="/admin/products/create">create a
                    product</a>?</p>
            @endif
        </div>
    </main>
@stop
