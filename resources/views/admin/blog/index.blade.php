@extends('admin.layout')
@section('title', 'Blog')
@section('page-title', 'Blog Posts')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>📝 Blog Posts ({{ $posts->count() }})</h2>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm">+ New Post</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td>
                        @if($post->image)
                        <img src="{{ public_image_url($post->image) }}" alt="" style="width:56px;height:56px;object-fit:cover;border-radius:8px;border:1px solid #D5CEC2;">
                        @else
                        <span style="font-size:1.5rem;">📄</span>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $post->title }}</strong>
                        <br><small style="color:#999;">/blog/{{ $post->slug }}</small>
                    </td>
                    <td>{{ $post->author ?? '—' }}</td>
                    <td>{{ $post->published_at?->format('d M Y') ?? '—' }}</td>
                    <td>
                        @if($post->is_published)
                        <span style="color:#27ae60;font-size:.8rem;font-weight:600;">● Published</span>
                        @else
                        <span style="color:#aaa;font-size:.8rem;">○ Draft</span>
                        @endif
                    </td>
                    <td style="display:flex;gap:.5rem;flex-wrap:wrap;">
                        @if($post->is_published)
                        <a href="{{ url('/blog/'.$post->slug) }}" target="_blank" class="btn btn-outline btn-sm">👁 View</a>
                        @endif
                        <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-outline btn-sm">✏️ Edit</a>
                        <form method="POST" action="{{ route('admin.blog.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" style="text-align:center;color:#aaa;padding:2rem;">No blog posts yet. <a href="{{ route('admin.blog.create') }}">Write your first post</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
