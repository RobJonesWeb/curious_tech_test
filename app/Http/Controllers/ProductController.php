<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Require Authentication
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all products
        $products = Product::all();

        // Check to see if the value of administrator for the user is true
        if (Auth::user()->administrator) {
            // Return the view with the product data
            return view('admin.read')->with('products', $products);
        }
        // Return a no access page
        return view('noaccess');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        // return the view for creating a product
        return view('admin.create');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        // Create a new product
        $product = new Product;

        // Alter the products columns
        $product->name = $request['name'];
        $product->stock = $request['stock'];
        $product->price = $request['price'];

        // Save the product
        $product->save();

        // Redirect the user back to the admin product list page upon completion
        return redirect('/admin/products');
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        // Find the product from the id
        $product = Product::findOrFail($id);

        // Return the update view passing along the product information so the fields can be pre-populated
        return view('admin.update')->with('product', $product);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, int $id)
    {
        // Find the product where id equals the passed in $id and update all the columns with the new values
        Product::where('id', $id)
            ->update(
                [
                    'name' => $request["name"],
                    'stock' => $request["stock"],
                    'price' => $request["price"]
                ]
            );

        // Redirect the user back to the admin product list page upon completion
        return redirect('/admin/products');
    }

    /**
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(int $id)
    {
        //Find the first instance of a product from the id value passed in
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect the user back to the admin product list page upon completion
        return redirect('/admin/products');
    }
}
