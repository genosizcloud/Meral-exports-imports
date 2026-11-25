<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertOk();
    expect(
        str_contains($response->getContent(), 'id="meralLuxuryLoader"') ||
        str_contains($response->getContent(), 'id="preloader"')
    )->toBeTrue();
});

test('public pages render with the existing database schema', function () {
    foreach (['/about', '/products', '/services', '/gallery', '/contact', '/blog'] as $path) {
        $this->get($path)->assertOk();
    }
});

test('guests are sent to the admin login and authenticated content screens load', function () {
    $this->get('/admin')->assertRedirect('/admin/login');
    $this->get('/admin/login')->assertOk();

    $user = \App\Models\User::factory()->create();
    $category = \App\Models\Category::create([
        'name' => 'Test Category', 'slug' => 'test-category', 'description' => 'Test',
        'emoji' => '🌾', 'tag_label' => 'Test', 'sort_order' => 1, 'is_active' => true,
    ]);

    $this->actingAs($user)->get('/admin')->assertOk();
    $this->actingAs($user)->get('/admin/products')->assertOk();
    $this->actingAs($user)->get('/admin/products/create')->assertOk();

    $this->actingAs($user)->post('/admin/products', [
        'category_id' => $category->id, 'name' => 'Test Commodity',
        'description' => 'Product CRUD smoke test', 'emoji' => '🌾',
        'badge_text' => 'Export Grade', 'badge_type' => 'green',
        'bg_from' => '#fff8e1', 'bg_to' => '#ffecb3', 'sort_order' => 0,
        'is_active' => '1', 'is_featured' => '1',
    ])->assertRedirect('/admin/products');

    $product = \App\Models\Product::where('name', 'Test Commodity')->firstOrFail();
    $this->assertDatabaseHas('products', ['name' => 'Test Commodity', 'category_id' => $category->id]);

    $this->actingAs($user)->put('/admin/products/'.$product->id, [
        'category_id' => $category->id, 'name' => 'Updated Test Commodity',
        'description' => 'Updated product CRUD smoke test', 'emoji' => '🌾',
        'badge_text' => 'Export Grade', 'badge_type' => 'green',
        'bg_from' => '#fff8e1', 'bg_to' => '#ffecb3', 'sort_order' => 0,
        'is_active' => '1', 'is_featured' => '1',
    ])->assertRedirect('/admin/products');
    $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'Updated Test Commodity']);

    $this->withHeader('Referer', 'http://localhost:8000/admin/products')
        ->actingAs($user)->delete('/admin/products/'.$product->id)->assertRedirect('/admin/products');
    $this->assertDatabaseMissing('products', ['id' => $product->id]);
});
