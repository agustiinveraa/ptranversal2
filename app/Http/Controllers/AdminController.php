<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Mostra el panell d'administració
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Mostra la llista de categories
     */
    public function categories()
    {
        $categories = Category::with('subcategories')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Mostra el formulari per crear una categoria
     */
    public function createCategory()
    {
        return view('admin.categories.create');
    }

    /**
     * Emmagatzema una nova categoria
     */
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Categoria creada correctament');
    }

    /**
     * Mostra el formulari per editar una categoria
     */
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Actualitza una categoria
     */
    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Categoria actualitzada correctament');
    }

    /**
     * Elimina una categoria
     */
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Categoria eliminada correctament');
    }

    /**
     * Mostra la llista de subcategories
     */
    public function subcategories()
    {
        $subcategories = Subcategory::with('category')->get();
        $categories = Category::all();
        return view('admin.subcategories.index', compact('subcategories', 'categories'));
    }

    /**
     * Mostra el formulari per crear una subcategoria
     */
    public function createSubcategory()
    {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Emmagatzema una nova subcategoria
     */
    public function storeSubcategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Subcategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.subcategories')->with('success', 'Subcategoria creada correctament');
    }

    /**
     * Mostra el formulari per editar una subcategoria
     */
    public function editSubcategory($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Actualitza una subcategoria
     */
    public function updateSubcategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.subcategories')->with('success', 'Subcategoria actualitzada correctament');
    }

    /**
     * Elimina una subcategoria
     */
    public function deleteSubcategory($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('admin.subcategories')->with('success', 'Subcategoria eliminada correctament');
    }

    /**
     * Mostra la llista de productes
     */
    public function products()
    {
        $products = Product::with('subcategory.category')->get();
        $subcategories = Subcategory::with('category')->get();
        return view('admin.products.index', compact('products', 'subcategories'));
    }

    /**
     * Mostra el formulari per crear un producte
     */
    public function createProduct()
    {
        $subcategories = Subcategory::with('category')->get();
        return view('admin.products.create', compact('subcategories'));
    }

    /**
     * Emmagatzema un nou producte
     */
    public function storeProduct(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
            'badge' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);

        Product::create($request->all());

        return redirect()->route('admin.products')->with('success', 'Producte creat correctament');
    }

    /**
     * Mostra el formulari per editar un producte
     */
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $subcategories = Subcategory::with('category')->get();
        return view('admin.products.edit', compact('product', 'subcategories'));
    }

    /**
     * Actualitza un producte
     */
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string',
            'badge' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('admin.products')->with('success', 'Producte actualitzat correctament');
    }

    /**
     * Elimina un producte
     */
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Producte eliminat correctament');
    }

    /**
     * Mostra la llista d'usuaris
     */
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Mostra el formulari per editar un usuari
     */
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Actualitza un usuari
     */
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'fullName' => 'nullable|string|max:255',
            'birthDate' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'shippingAddress' => 'nullable|string|max:255',
            'billingAddress' => 'nullable|string|max:255',
            'preferredMaterial' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.users')->with('success', 'Usuari actualitzat correctament');
    }

    /**
     * Elimina un usuari
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Usuari eliminat correctament');
    }
}