<?php

namespace App\Http\Controllers;

use App\Product;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        // Return all products
        $products = Product::all();

        // Return the index view with the product data
        return view('index')->with('products', $products);
    }
}
