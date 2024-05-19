<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $categoryId = $request->query('category');
        
        $products = ($categoryId) ? Product::where('category_id', $categoryId)->get() : Product::all();

        return view('product.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function adminIndex(Request $request)
    {
        $categories = Category::all();

        $categoryId = $request->query('category');

        $products = Product::paginate(10);

        return view('admin.product.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category' => 'required|numeric',
        ]);

        $validatedData['category_id'] = $validatedData['category'];
        unset($validatedData['category']);

        Product::create($validatedData);


        return redirect()->route('admin.index')->with('success', 'Produit ajouté avec succès');
    }

    public function show(string $id)
    {
        $product = Product::find($id);

        return view('product.show', [
            'product' => $product
        ]);
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function delete(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Produit supprimé avec succès');
    }

    public function filter(Request $request)
    {
        $price = $request->input('price');
        $category = $request->input('category');
        $categories = Category::all();

        $productsQuery = Product::query();

        if ($price) {
            $productsQuery->orderBy('price', $price);
        }
        if ($category) {
            $productsQuery->where('category_id', $category);
        }

        $products = $productsQuery->get();

        return view('product.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
