@extends('layouts.main')
@section('title', 'Home')
@section('content')
    <main id="container">
        <h2 class="p-3">Inventory</h2>
        <div class="d-flex flex-wrap justify-content-around">
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
                            <th scope="row"><i class="fa fa-pencil-square-o fa-2x"></i><i class="fa fa-times fa-2x"></i></th>
                        </tr>
                    @else
                        <tr class="bg-danger text-dark">
                            <th scope="row">{{$product["name"]}}</th>
                            <th scope="row">{{$product["stock"]}}</th>
                            <th scope="row">£{{$product["price"]}}</th>
                            <th scope="row"><i class="fa fa-pencil-square-o fa-2x"></i><i class="fa fa-times fa-2x"></i></th>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@stop
