<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Muestra la página del catálogo con todos los productos.
     */
    public function index()
    {
        $categories = Category::with(['subcategories', 'products'])->get();
        $products = Product::with(['subcategory.category'])->get();
        return view('pages.catalog', compact('categories', 'products'));
    }

    public function stock()
    {
        $products = Product::with(['subcategory.category'])->orderBy('stock', 'desc')->get();
        foreach($products as $product) {
            $product->sales = rand(0, 100);
        }
        return view('admin.stock', compact('products'));
    }

    public function updateStock(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->stock -= $request->quantity;
        $product->save();
        return redirect()->back()->with('success', 'Stock actualitzat correctament');
    }

    public function applyDiscount(Request $request)
    {
        $discount = $request->discount;
        Product::query()->update(['price' => DB::raw("price * (1 - $discount / 100)")]);
        return redirect()->back()->with('success', 'Descompte aplicat correctament');
    }

    public function applyDiscountToProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $discount = $request->input('discount');
        $product->price = $product->price * (1 - $discount / 100);
        $product->save();
        return redirect()->back()->with('success', 'Descompte aplicat correctament');
    }

    public function deleteDiscount(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->price = $product->original_price;
        $product->save();
        return redirect()->back()->with('success', 'Descompte eliminat correctament');
    }


}
