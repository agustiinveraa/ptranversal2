<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->get();
        $products = Product::with(['subcategory.category'])->get();

        return view('pages.catalog', compact('categories', 'products'));
    }
}