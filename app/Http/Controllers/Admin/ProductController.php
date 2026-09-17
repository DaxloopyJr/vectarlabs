<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', ['products' => Product::orderBy('sort_order')->get()]);
    }

    public function create()
    {
        return view('admin.products.form', ['product' => new Product(['published' => true, 'type' => 'saas'])]);
    }

    public function store(Request $request)
    {
        Product::create($this->validateData($request));

        return redirect()->route('admin.products.index')->with('success', 'Product added.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.form', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($this->validateData($request));

        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Product removed.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:saas,standalone'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'published' => ['boolean'],
        ]) + ['published' => $request->boolean('published'), 'sort_order' => $request->integer('sort_order')];
    }
}
