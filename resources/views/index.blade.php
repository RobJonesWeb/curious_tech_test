@extends('layouts.main')
@section('title', 'Home')
@section('content')
    <main id="container">
        <h2 class="p-3">Welcome to Curious fruit where we go coconuts over selling</h2>
        <div class="d-flex flex-wrap justify-content-around">
            @foreach($products as $product)
                <div class="col-sm-3">
                    <div class="card w-100 my-2 p-3">
                        <img class="card-img-top" src="https://via.placeholder.com/30x30" alt="Card image alt text">
                        <div class="card-body">
                            <h3 class="card-title">{{$product["name"]}}</h3>
                            <p class="card-text my-0">Stock: {{$product["stock"]}}</p>
                            <p class="card-text">Price: £{{$product["price"]}}</p>
                            @if($product["stock"] > 0)
                                <a href="#" class="btn btn-success" onclick="alert('You have just bought a curious {{$product["name"]}}')">Buy a Curious {{$product["name"]}}!</a>
                            @else
                                <a href="#" class="btn btn-secondary" onclick="alert('Sorry, we have sold out of curious {{$product["name"]}}\'s')" disabled>Sold out, sorry</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@stop
