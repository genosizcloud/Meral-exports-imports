<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{GalleryImage, Category};
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::with('category')->orderBy('sort_order')->get();
        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.gallery.form', [
            'image'      => new GalleryImage,
            'categories' => $categories,
            'action'     => 'create',
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request, true);
        $data['is_active']   = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['image'] = UploadHelper::storeImage($request->file('image'), 'gallery');

        GalleryImage::create($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image added!');
    }

    public function edit(GalleryImage $gallery)
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.gallery.form', [
            'image'      => $gallery,
            'categories' => $categories,
            'action'     => 'edit',
        ]);
    }

    public function update(Request $request, GalleryImage $gallery)
    {
        $data = $this->validated($request, false);
        $data['is_active']   = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            UploadHelper::deleteIfExists($gallery->image);
            $data['image'] = UploadHelper::storeImage($request->file('image'), 'gallery');
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image updated!');
    }

    public function destroy(GalleryImage $gallery)
    {
        UploadHelper::deleteIfExists($gallery->image);
        $gallery->delete();

        return back()->with('success', 'Gallery image deleted!');
    }

    private function validated(Request $request, bool $requireImage): array
    {
        $rules = [
            'title'        => 'nullable|string|max:120',
            'category_id'  => 'nullable|exists:categories,id',
            'sort_order'   => 'integer|min:0',
            'image'        => ($requireImage ? 'required' : 'nullable') . '|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
        ];

        $data = $request->validate($rules);
        unset($data['image']);

        $data['category_id'] = $data['category_id'] ?? null;
        $data['sort_order']  = $data['sort_order'] ?? 0;

        return $data;
    }
}
