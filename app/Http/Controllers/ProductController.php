<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Muestra la página del catálogo con todos los productos.
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.catalog', compact('products'));
    }
}
