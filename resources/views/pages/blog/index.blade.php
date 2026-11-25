@extends('layouts.app')

@php
    $pageTitle = 'Global Trade Insights & Market Bulletins';
    $pageDesc = 'Industry commentary, export regulations, agricultural harvest forecasts, and container logistics updates from Meral Exports.';
@endphp

@section('content')

<!-- PAGE HERO -->
<section class="bg-forest-deep text-white py-14">
  <div class="max-w-7xl mx-auto px-6 space-y-4">
    <span class="font-label text-xs text-gold-light uppercase tracking-wider font-semibold">Commodity Intelligence</span>
    <h1 class="font-headline text-3xl sm:text-4xl text-white font-bold">Global Food Trade Insights &amp; Market Bulletins</h1>
    <p class="font-body text-sm sm:text-base text-slate-300 max-w-2xl leading-relaxed">
      Practical commentary for commodity traders, procurement managers, and food logistics professionals navigating harvest seasonality, freight trends, and compliance.
    </p>
  </div>
</section>

<!-- BLOG LIST SECTION -->
<section class="py-16 bg-light-surface">
  <div class="max-w-7xl mx-auto px-6">
    @if($posts->isNotEmpty())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($posts as $post)
      <a href="{{ url('/blog/' . $post->slug) }}" class="group bg-white rounded-lg border border-border-subtle overflow-hidden shadow-sm hover:border-light-primary hover:shadow-md transition flex flex-col">
        <div class="aspect-[16/9] bg-light-surface-container overflow-hidden relative">
          @if($post->image)
            <img src="{{ public_image_url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
          @else
            <div class="w-full h-full flex items-center justify-center text-4xl">📰</div>
          @endif
        </div>
        <div class="p-6 flex-1 flex flex-col justify-between">
          <div>
            <div class="flex items-center gap-3 text-xs text-slate-muted font-label uppercase tracking-wide mb-2">
              @if($post->published_at)<span>{{ $post->published_at->format('M d, Y') }}</span>@endif
              @if($post->author)<span>&bull; {{ $post->author }}</span>@endif
            </div>
            <h3 class="font-headline text-lg font-bold text-charcoal group-hover:text-light-primary transition line-clamp-2">
              {{ $post->title }}
            </h3>
            <p class="font-body text-xs text-slate-muted mt-2 line-clamp-3 leading-relaxed">
              {{ Str::limit($post->excerpt ?? strip_tags($post->content), 140) }}
            </p>
          </div>
          <div class="mt-4 pt-3 border-t border-border-subtle/60 flex items-center justify-between text-xs font-label text-light-primary font-semibold">
            <span>Read Market Brief</span>
            <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
          </div>
        </div>
      </a>
      @endforeach
    </div>
    @else
    <div class="text-center py-20 bg-white rounded-lg border border-border-subtle">
      <span class="material-symbols-outlined text-4xl text-slate-400 mb-2">article</span>
      <h3 class="font-headline text-xl text-charcoal font-bold">New Trade Insights in Preparation</h3>
      <p class="text-xs text-slate-muted mt-1">Our compliance team is updating seasonal harvest reports. Check back shortly.</p>
    </div>
    @endif
  </div>
</section>

@endsection
