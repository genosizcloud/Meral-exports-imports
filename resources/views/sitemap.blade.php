<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url><loc>{{ $baseUrl }}/</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>weekly</changefreq><priority>1.0</priority></url>
    <url><loc>{{ $baseUrl }}/about</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ $baseUrl }}/products</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>weekly</changefreq><priority>0.9</priority></url>
    <url><loc>{{ $baseUrl }}/services</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>monthly</changefreq><priority>0.7</priority></url>
    <url><loc>{{ $baseUrl }}/gallery</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>monthly</changefreq><priority>0.6</priority></url>
    <url><loc>{{ $baseUrl }}/contact</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>monthly</changefreq><priority>0.8</priority></url>
    <url><loc>{{ $baseUrl }}/blog</loc><lastmod>{{ now()->toAtomString() }}</lastmod><changefreq>weekly</changefreq><priority>0.75</priority></url>

    @foreach($blogPosts ?? [] as $post)
    <url><loc>{{ $baseUrl }}/blog/{{ $post->slug }}</loc><lastmod>{{ $post->updated_at->toAtomString() }}</lastmod><changefreq>monthly</changefreq><priority>0.65</priority></url>
    @endforeach

    @foreach($categories as $cat)
    <url><loc>{{ $baseUrl }}/products?cat={{ $cat->slug }}</loc><lastmod>{{ $cat->updated_at->toAtomString() }}</lastmod><changefreq>weekly</changefreq><priority>0.75</priority></url>
    @endforeach

    @foreach($products as $product)
    <url><loc>{{ $baseUrl }}/products?cat={{ $product->category->slug ?? '' }}</loc><lastmod>{{ $product->updated_at->toAtomString() }}</lastmod><changefreq>monthly</changefreq><priority>0.6</priority></url>
    @endforeach

</urlset>
