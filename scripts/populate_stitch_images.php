<?php

require dirname(__DIR__) . '/vendor/autoload.php';
$app = require_once dirname(__DIR__) . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Category;
use App\Models\Product;
use App\Models\BlogPost;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\File;

$stitchDir = public_path('images/stitch');

// 1. Categories
$catMap = [
    'rice' => 'cat_grains.jpg',
    'pulses' => 'cat_pulses.jpg',
    'grocery' => 'cat_spices.jpg',
    'snacks' => 'cat_oils.jpg',
    'frozen' => 'shipping_logistics_port.jpg',
    'fish' => 'shipping_logistics_port.jpg',
];

foreach ($catMap as $slug => $file) {
    $src = $stitchDir . '/' . $file;
    if (file_exists($src)) {
        $destRel = 'uploads/categories/' . $file;
        File::copy($src, public_path($destRel));
        Category::where('slug', $slug)->update(['image' => $destRel]);
        echo "Updated Category [$slug] with $destRel\n";
    }
}

// 2. Products
$prodMap = [
    'basmati-rice-extra-long' => 'product_basmati_rice.jpg',
    'sona-masoori-rice' => 'product_basmati_rice.jpg',
    'matta-rice-kerala-red-rice' => 'hero_spices_grains.jpg',
    'ponni-rice' => 'cat_grains.jpg',
    'red-lentils-masoor-dal' => 'cat_pulses.jpg',
    'green-moong-dal' => 'cat_pulses.jpg',
    'chana-dal-chickpea' => 'cat_pulses.jpg',
    'black-urad-dal' => 'cat_pulses.jpg',
    'virgin-coconut-oil' => 'cat_oils.jpg',
    'kerala-spice-mix' => 'product_black_pepper.jpg',
    'roasted-cashews' => 'product_cardamom.jpg',
    'frozen-samosa' => 'cat_oils.jpg',
    'frozen-prawns-iqf' => 'shipping_logistics_port.jpg',
];

foreach ($prodMap as $slug => $file) {
    $src = $stitchDir . '/' . $file;
    if (file_exists($src)) {
        $destRel = 'uploads/products/' . $slug . '_' . $file;
        File::copy($src, public_path($destRel));
        Product::where('slug', $slug)->update(['image' => $destRel]);
        echo "Updated Product [$slug] with $destRel\n";
    }
}

// 3. Blog Posts
$blogMap = [
    'why-kerala-spices-are-sought-worldwide' => 'cat_spices.jpg',
    'export-documentation-guide-food-importers' => 'shipping_logistics_port.jpg',
    'frozen-seafood-exports-quality' => 'facility_quality_lab.jpg',
];

foreach ($blogMap as $slug => $file) {
    $src = $stitchDir . '/' . $file;
    if (file_exists($src)) {
        $destRel = 'uploads/blog/' . $file;
        File::copy($src, public_path($destRel));
        BlogPost::where('slug', $slug)->update(['image' => $destRel]);
        echo "Updated BlogPost [$slug] with $destRel\n";
    }
}

// 4. Gallery Images
$galleryItems = [
    ['title' => 'Laboratory Quality Verification & Chemical Analysis', 'category' => 'facility', 'file' => 'facility_quality_lab.jpg'],
    ['title' => 'Container Logistics & Deep Water Port Operations', 'category' => 'logistics', 'file' => 'shipping_logistics_port.jpg'],
    ['title' => 'Malabar Whole Black Pepper (550GL / 570GL Graded)', 'category' => 'products', 'file' => 'product_black_pepper.jpg'],
    ['title' => '1121 Extra Long Grain Steam Basmati Rice Sorting', 'category' => 'products', 'file' => 'product_basmati_rice.jpg'],
    ['title' => 'Export Grade Green Cardamom Graded Lots (7-8mm)', 'category' => 'products', 'file' => 'product_cardamom.jpg'],
    ['title' => 'Consolidated Spices & Agricultural Produce Warehouse', 'category' => 'facility', 'file' => 'hero_spices_grains.jpg'],
    ['title' => 'Pulses & Legumes Quality Grading & Packaging', 'category' => 'products', 'file' => 'cat_pulses.jpg'],
    ['title' => 'Cold-Pressed Oils & Seed Export Packaging', 'category' => 'products', 'file' => 'cat_oils.jpg'],
];

GalleryImage::truncate();
foreach ($galleryItems as $item) {
    $src = $stitchDir . '/' . $item['file'];
    if (file_exists($src)) {
        $destRel = 'uploads/gallery/' . $item['file'];
        File::copy($src, public_path($destRel));
        GalleryImage::create([
            'title' => $item['title'],
            'category' => $item['category'],
            'image' => $destRel,
            'is_active' => true,
        ]);
        echo "Created GalleryImage [{$item['title']}] with $destRel\n";
    }
}
echo "ALL POPULATED SUCCESSFULLY!\n";
