<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

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
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        if (Auth::user()->administrator) {
            return view('admin.read')->with('products', $products);
        }
        return view('noaccess');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $products = Product::all();
        $product = new Product;
        $product->name = $request['name'];
        $product->stock = $request['stock'];
        $product->price = $request['price'];
        $product->save();
        return redirect('/admin/products')
            ->with('products', $products);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit(int $id)
    {
        $product = Product::find($id);
        return view('admin.update')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, int $id)
    {
        $products = Product::all();
        Product::where('id', $id)
            ->update(
                [
                    'name' => $request["name"],
                    'stock' => $request["stock"],
                    'price' => $request["price"]
                ]
            );

        return redirect('/admin/products')
            ->with('products', $products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy(int $id)
    {
        $products = Product::all();

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/admin/products')->with('products', $products);
    }
}
