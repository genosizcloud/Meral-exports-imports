<?php

require dirname(__DIR__) . '/vendor/autoload.php';
$app = require_once dirname(__DIR__) . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\GalleryImage;

GalleryImage::truncate();
$items = [
    ['title' => 'Laboratory Quality Verification & Chemical Analysis', 'category_id' => 5, 'sort_order' => 1, 'file' => 'facility_quality_lab.jpg'],
    ['title' => 'Container Logistics & Deep Water Port Operations', 'category_id' => 2, 'sort_order' => 2, 'file' => 'shipping_logistics_port.jpg'],
    ['title' => 'Malabar Whole Black Pepper (550GL / 570GL Graded)', 'category_id' => 5, 'sort_order' => 3, 'file' => 'product_black_pepper.jpg'],
    ['title' => '1121 Extra Long Grain Steam Basmati Rice Sorting', 'category_id' => 1, 'sort_order' => 4, 'file' => 'product_basmati_rice.jpg'],
    ['title' => 'Export Grade Green Cardamom Graded Lots (7-8mm)', 'category_id' => 5, 'sort_order' => 5, 'file' => 'product_cardamom.jpg'],
    ['title' => 'Consolidated Spices & Agricultural Produce Warehouse', 'category_id' => 5, 'sort_order' => 6, 'file' => 'hero_spices_grains.jpg'],
    ['title' => 'Pulses & Legumes Quality Grading & Packaging', 'category_id' => 3, 'sort_order' => 7, 'file' => 'cat_pulses.jpg'],
    ['title' => 'Cold-Pressed Oils & Seed Export Packaging', 'category_id' => 4, 'sort_order' => 8, 'file' => 'cat_oils.jpg'],
];

foreach ($items as $item) {
    GalleryImage::create([
        'title' => $item['title'],
        'category_id' => $item['category_id'],
        'sort_order' => $item['sort_order'],
        'image' => 'uploads/gallery/' . $item['file'],
        'is_active' => true,
    ]);
}
echo 'GALLERY UPDATED: ' . GalleryImage::count() . PHP_EOL;
