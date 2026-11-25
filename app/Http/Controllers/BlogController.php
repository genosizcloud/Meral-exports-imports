<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('published_at')->orWhere('published_at', '<=', now());
            })
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        $data = pageData(compact('posts'));

        return view('pages.blog.index', $data);
    }

    public function show(BlogPost $post)
    {
        if (! $post->is_published || ($post->published_at && $post->published_at->isFuture())) {
            abort(404);
        }

        $recent = BlogPost::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->where(function ($q) {
                $q->whereNull('published_at')->orWhere('published_at', '<=', now());
            })
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        $data = pageData(compact('post', 'recent'));

        return view('pages.blog.show', $data);
    }
}
