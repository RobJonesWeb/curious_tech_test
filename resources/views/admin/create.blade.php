<main id="container">
    @include('layouts.main')
    <h2 class="p-3">Add a new Product</h2>
    <form method="post" action="{{ route('products.store') }}">
        @csrf
        <div class="col-sm">
            <div class="card w-100 my-2 p-3">
                <div class="form-row px-5">
                    <div class="form-group col-sm-12">
                        <label for="product-name">Product Name</label>
                        <input type="text" name="name" class="form-control" id="product-name"
                               placeholder="Product Name...">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="product-name">Product Stock</label>
                        <input type="number" name="stock" step="1" class="form-control" id="product-name"
                               placeholder="Product Stock...">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="product-name">Product Price (£)</label>
                        <input type="number" name="price" step=".01" class="form-control" id="product-name"
                               placeholder="Product Price">
                    </div>
                    <div class="form-group col-sm-12">
                        <input type="submit" value="Add Product">
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
