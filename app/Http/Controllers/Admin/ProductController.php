<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Product, Category};
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('category_id')->orderBy('sort_order')->get();
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.products.form', ['product' => new Product, 'categories' => $categories, 'action' => 'create']);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request, true);
        $data['is_active']   = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            $data['image'] = UploadHelper::storeImage($request->file('image'), 'products');
        }

        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Product created!');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.products.form', compact('product', 'categories') + ['action' => 'edit']);
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validated($request, false);
        $data['is_active']   = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            UploadHelper::deleteIfExists($product->image);
            $data['image'] = UploadHelper::storeImage($request->file('image'), 'products');
        }

        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        UploadHelper::deleteIfExists($product->image);
        $product->delete();
        return back()->with('success', 'Product deleted!');
    }

    private function validated(Request $request, bool $creating): array
    {
        $rules = [
            'category_id'  => 'required|exists:categories,id',
            'name'         => 'required|string|max:100',
            'description'  => 'required|string',
            'emoji'        => 'nullable|string|max:10',
            'badge_text'   => 'required|string|max:40',
            'badge_type'   => 'required|in:green,blue,orange',
            'bg_from'      => 'required|string|max:20',
            'bg_to'        => 'required|string|max:20',
            'sort_order'   => 'integer|min:0',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
        ];

        if ($creating && ! $request->hasFile('image')) {
            $rules['emoji'] = 'required|string|max:10';
        }

        $data = $request->validate($rules);

        if (empty($data['emoji'])) {
            $data['emoji'] = '📦';
        }

        unset($data['image']);

        return $data;
    }
}
