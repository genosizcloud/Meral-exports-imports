@extends('layouts.app')

@php
    $pageTitle = $post->title;
    $pageDesc = Str::limit($post->excerpt ?? strip_tags($post->content), 160);
@endphp

@section('content')

<!-- PAGE HERO -->
<section class="bg-forest-deep text-white py-14">
  <div class="max-w-7xl mx-auto px-6 space-y-4">
    <span class="font-label text-xs text-gold-light uppercase tracking-wider font-semibold">Commodity Intelligence</span>
    <h1 class="font-headline text-3xl sm:text-4xl text-white font-bold">Global Food Trade Insights &amp; Port Bulletins</h1>
    <p class="font-body text-sm sm:text-base text-slate-300 max-w-2xl leading-relaxed">
      Practical commentary for commodity traders, procurement managers, and food logistics professionals navigating harvest seasonality, freight trends, and compliance.
    </p>
  </div>
</section>

<!-- FEATURED ARTICLE: READABLE EDITORIAL VIEW -->
<section class="py-14 bg-white border-b border-border-subtle">
  <div class="max-w-4xl mx-auto px-6">
    
    <div class="mb-6">
      <div class="inline-flex items-center px-3 py-1 rounded bg-gold-muted text-accent font-label text-xs font-semibold uppercase">
        Market Brief &bull; Trade Compliance
      </div>
      <h1 class="font-headline text-2xl sm:text-3xl lg:text-4xl text-charcoal font-bold mt-3 leading-snug">
        {{ $post->title }}
      </h1>
      <div class="flex items-center gap-4 text-xs text-slate-muted font-label uppercase tracking-wide mt-3 pb-6 border-b border-border-subtle">
        <span>By {{ $post->author ?: 'Trade Compliance Desk' }}</span>
        <span>&bull;</span>
        <span>Published {{ $post->published_at ? $post->published_at->format('F d, Y') : 'Recent' }}</span>
        <span>&bull;</span>
        <span>5 Min Read</span>
      </div>
    </div>

    @if($post->image)
    <div class="aspect-[16/9] rounded-xl overflow-hidden mb-8 border border-border-subtle shadow-sm bg-light-surface-container">
      <img src="{{ public_image_url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
    </div>
    @endif

    <article class="font-body text-base text-charcoal space-y-6 leading-relaxed">
      {!! $post->content !!}
    </article>

    <div class="pt-8 border-t border-border-subtle mt-10 flex items-center justify-between">
      <a href="{{ url('/blog') }}" class="font-label text-xs uppercase tracking-wide text-light-primary hover:text-accent font-semibold flex items-center gap-1.5">
        <span class="material-symbols-outlined text-sm">arrow_back</span>
        <span>Back to All Trade Insights</span>
      </a>
      <a href="{{ url('/contact') }}" class="px-5 py-2 rounded bg-light-primary text-white font-label text-xs uppercase tracking-wide hover:bg-forest-deep transition">
        Inquire With Authors
      </a>
    </div>

  </div>
</section>

<!-- RECENT TRADE BRIEFS -->
@if(isset($recent) && $recent->isNotEmpty())
<section class="py-16 bg-light-surface">
  <div class="max-w-7xl mx-auto px-6">
    <h3 class="font-headline text-2xl font-bold text-charcoal mb-8">Recent Trade Briefs &amp; Harvest Reports</h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @foreach($recent as $r)
      <a href="{{ url('/blog/' . $r->slug) }}" class="group bg-white rounded-lg border border-border-subtle overflow-hidden shadow-sm hover:border-light-primary transition block">
        <div class="aspect-[16/9] overflow-hidden bg-light-surface-container">
          @if($r->image)
            <img src="{{ public_image_url($r->image) }}" alt="{{ $r->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
          @else
            <div class="w-full h-full flex items-center justify-center text-4xl">📰</div>
          @endif
        </div>
        <div class="p-6">
          <span class="text-xs text-accent font-label uppercase font-semibold">Commodity Analysis</span>
          <h4 class="font-headline text-lg font-bold text-charcoal mt-1 group-hover:text-light-primary transition line-clamp-2">
            {{ $r->title }}
          </h4>
          <p class="font-body text-xs text-slate-muted mt-2 line-clamp-2">
            {{ Str::limit($r->excerpt ?? strip_tags($r->content), 120) }}
          </p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection
