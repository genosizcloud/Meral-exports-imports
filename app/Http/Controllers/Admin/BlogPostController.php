<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Support\PublicImage;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderByDesc('published_at')->orderByDesc('created_at')->get();
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.form', ['post' => new BlogPost, 'action' => 'create']);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = BlogPost::uniqueSlug($data['slug'] ?: $data['title']);
        $data['is_published'] = $request->boolean('is_published');

        if ($data['is_published'] && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            $data['image'] = PublicImage::store($request->file('image'), 'blog');
        }

        BlogPost::create($data);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post published!');
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blog.form', ['post' => $blog, 'action' => 'edit']);
    }

    public function update(Request $request, BlogPost $blog)
    {
        $data = $this->validated($request);
        $data['slug'] = BlogPost::uniqueSlug($data['slug'] ?: $data['title'], $blog->id);
        $data['is_published'] = $request->boolean('is_published');

        if ($data['is_published'] && empty($data['published_at'])) {
            $data['published_at'] = $blog->published_at ?? now();
        }

        if ($request->hasFile('image')) {
            PublicImage::delete($blog->image);
            $data['image'] = PublicImage::store($request->file('image'), 'blog');
        }

        $blog->update($data);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated!');
    }

    public function destroy(BlogPost $blog)
    {
        PublicImage::delete($blog->image);
        $blog->delete();

        return back()->with('success', 'Blog post deleted!');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title'        => 'required|string|max:200',
            'slug'         => 'nullable|string|max:200|regex:/^[a-z0-9\-]*$/',
            'excerpt'      => 'required|string|max:500',
            'content'      => 'required|string',
            'author'       => 'nullable|string|max:100',
            'published_at' => 'nullable|date',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
        ]);
    }
}
