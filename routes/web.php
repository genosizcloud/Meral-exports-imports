<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\Admin\{
    AdminAuthController,
    DashboardController,
    HeroController,
    CategoryController,
    ProductController,
    FeatureController,
    StatController,
    ExportCountryController,
    GalleryController,
    BlogPostController,
    EnquiryController as AdminEnquiryController,
    SettingsController,
    SeoController,
};

// ── Shared data helper ────────────────────────────────────────────────────────
if (! function_exists('pageData')) {
    function pageData(array $extra = []): array {
        $base = [
            'categories' => \App\Models\Category::where('is_active', true)->orderBy('sort_order')->get(),
            'settings'   => \App\Models\SiteSetting::pluck('value', 'key')->toArray(),
        ];
        return array_merge($base, $extra);
    }
}

// ── Maintenance page (standalone) ─────────────────────────────────────────────
Route::get('/maintenance', function () {
    return response()->view('maintenance', [], 503)
        ->header('Retry-After', '3600');
})->name('maintenance');

// ── Public frontend ───────────────────────────────────────────────────────────
Route::get('/', function () {
    $data = pageData([
        'hero'          => \App\Models\HeroContent::first(),
        'products'      => \App\Models\Product::with('category')->where('is_active', true)->orderBy('sort_order')->get(),
        'features'      => \App\Models\Feature::where('is_active', true)->orderBy('sort_order')->get(),
        'stats'         => \App\Models\Stat::orderBy('sort_order')->get(),
        'countries'     => \App\Models\ExportCountry::where('is_active', true)->orderBy('sort_order')->get(),
        'galleryImages' => \App\Models\GalleryImage::where('is_active', true)->orderBy('sort_order')->get(),
    ]);

    // Support both homepage versions: Default (Modular pages.home) and Legacy (Standalone index)
    if (request('v') === 'legacy' || request('version') === 'legacy' || request('view') === 'index' || env('HOME_VERSION') === 'index') {
        return view('index', $data);
    }

    return view('pages.home', $data);
});

Route::get('/about', function () {
    $data = pageData([
        'features' => \App\Models\Feature::where('is_active', true)->orderBy('sort_order')->get(),
        'stats'    => \App\Models\Stat::orderBy('sort_order')->get(),
    ]);
    return view('pages.about', $data);
});

Route::get('/products', function () {
    $data = pageData([
        'products' => \App\Models\Product::with('category')->where('is_active', true)->orderBy('sort_order')->get(),
    ]);
    return view('pages.products', $data);
});

Route::get('/products/{product}', function ($product) {
    $item = is_numeric($product) ? \App\Models\Product::find($product) : null;
    if (! $item) {
        $item = \App\Models\Product::all()->first(fn($p) => \Illuminate\Support\Str::slug($p->name) === $product);
    }
    if (! $item || ! $item->is_active) {
        abort(404);
    }
    $item->load('category');
    $relatedProducts = \App\Models\Product::with('category')
        ->where('is_active', true)
        ->where('id', '!=', $item->id)
        ->where('category_id', $item->category_id)
        ->take(4)
        ->get();
    if ($relatedProducts->isEmpty()) {
        $relatedProducts = \App\Models\Product::with('category')
            ->where('is_active', true)
            ->where('id', '!=', $item->id)
            ->take(4)
            ->get();
    }
    $data = pageData([
        'product' => $item,
        'relatedProducts' => $relatedProducts,
        'pageTitle' => $item->name . ' – Export Specifications',
        'pageDesc' => \Illuminate\Support\Str::limit($item->description, 160),
    ]);
    return view('pages.product-detail', $data);
})->name('products.detail');

Route::get('/services', function () {
    $data = pageData([
        'stats'            => \App\Models\Stat::orderBy('sort_order')->get(),
        'exportCountries'  => \App\Models\ExportCountry::where('is_active', true)->orderBy('sort_order')->get(),
    ]);
    return view('pages.services', $data);
});

Route::get('/gallery', function () {
    $data = pageData([
        'galleryImages' => \App\Models\GalleryImage::with('category')->where('is_active', true)->orderBy('sort_order')->get(),
        'products'      => \App\Models\Product::with('category')->where('is_active', true)->orderBy('sort_order')->get(),
        'stats'         => \App\Models\Stat::orderBy('sort_order')->get(),
    ]);
    return view('pages.gallery', $data);
});

Route::get('/contact', function () {
    $data = pageData([
        'stats' => \App\Models\Stat::orderBy('sort_order')->get(),
    ]);
    return view('pages.contact', $data);
})->name('contact');

Route::post('/enquiry', [EnquiryController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('enquiry.store');

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{post}', [BlogController::class, 'show']);

// ── Admin: Guest routes ───────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login',  [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);

    // Protected admin routes
    Route::middleware('auth')->group(function () {
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/',       [DashboardController::class, 'index'])->name('dashboard');

        Route::get('hero',    [HeroController::class, 'edit'])->name('hero.edit');
        Route::put('hero',    [HeroController::class, 'update'])->name('hero.update');

        Route::resource('categories', CategoryController::class);
        Route::resource('products',   ProductController::class);
        Route::resource('gallery', GalleryController::class)->except(['show']);
        Route::resource('blog', BlogPostController::class)->except(['show']);
        Route::resource('enquiries', AdminEnquiryController::class)->only(['index', 'show', 'update', 'destroy']);
        Route::resource('features',   FeatureController::class);
        Route::resource('stats',      StatController::class);

        Route::put('countries/section', [ExportCountryController::class, 'updateSection'])->name('countries.section');
        Route::bind('country', fn (string $value) => \App\Models\ExportCountry::findOrFail($value));
        Route::resource('countries', ExportCountryController::class);

        Route::get('settings',  [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings',  [SettingsController::class, 'update'])->name('settings.update');

        Route::get('seo',  [SeoController::class, 'index'])->name('seo.index');
        Route::put('seo',  [SeoController::class, 'update'])->name('seo.update');
    });
});

// ── Sitemap ───────────────────────────────────────────────────────────────────
Route::get('/sitemap.xml', function () {
    $categories = \App\Models\Category::where('is_active', true)->orderBy('sort_order')->get();
    $products   = \App\Models\Product::where('is_active', true)->orderBy('updated_at', 'desc')->get();
    $blogPosts  = \App\Models\BlogPost::where('is_published', true)->orderByDesc('updated_at')->get();
    $settings   = \App\Models\SiteSetting::pluck('value', 'key')->toArray();
    $baseUrl    = rtrim($settings['seo_canonical_url'] ?? url('/'), '/');
    return response()->view('sitemap', compact('categories', 'products', 'blogPosts', 'baseUrl'))
        ->header('Content-Type', 'application/xml');
});

// ── Robots.txt ────────────────────────────────────────────────────────────────
Route::get('/robots.txt', function () {
    $settings = \App\Models\SiteSetting::pluck('value', 'key')->toArray();
    $baseUrl  = rtrim($settings['seo_canonical_url'] ?? url('/'), '/');
    $robots   = $settings['seo_robots'] ?? 'index, follow';
    $content  = "User-agent: *\n";
    $content .= str_contains($robots, 'noindex') ? "Disallow: /\n" : "Disallow: /admin\n";
    $content .= "Allow: /\n\n";
    $content .= "Sitemap: {$baseUrl}/sitemap.xml\n";
    return response($content)->header('Content-Type', 'text/plain');
});
