<main id="container">
    @include('layouts.main')
    <h2 class="p-3">Editing {{$product['name']}}</h2>
    <form method="post" action="{{ route('products.update', ['product' => $product['id']]) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="col-sm">
            <div class="card w-100 my-2 p-3">
                <div class="form-row px-5">
                    <div class="form-group col-sm-12">
                        <label for="product-name">Product Name</label>
                        <input type="text" name="name" class="form-control" id="product-name"
                               value="{{$product['name']}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="product-name">Product Stock</label>
                        <input type="number" name="stock" class="form-control" id="product-name"
                               value="{{$product['stock']}}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="product-name">Product Price</label>
                        <input type="number" name="price" step=".01" class="form-control" id="product-name"
                               value="{{$product['price']}}">
                    </div>
                    <div class="form-group col-sm-12">
                        <input type="submit" value="Update Product">
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
