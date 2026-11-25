<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.form', ['category' => new Category, 'action' => 'create']);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = UploadHelper::storeImage($request->file('image'), 'categories');
        }

        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category created!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category') + ['action' => 'edit']);
    }

    public function update(Request $request, Category $category)
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            UploadHelper::deleteIfExists($category->image);
            $data['image'] = UploadHelper::storeImage($request->file('image'), 'categories');
        }

        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated!');
    }

    public function destroy(Category $category)
    {
        UploadHelper::deleteIfExists($category->image);
        $category->delete();
        return back()->with('success', 'Category deleted!');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name'        => 'required|string|max:100',
            'description' => 'required|string',
            'emoji'       => 'required|string|max:10',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
            'tag_label'   => 'required|string|max:40',
            'sort_order'  => 'integer|min:0',
            'is_active'   => 'boolean',
        ]);
    }
}
