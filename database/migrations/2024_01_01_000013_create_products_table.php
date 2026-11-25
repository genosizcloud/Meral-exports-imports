<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->string('emoji');
            $table->string('badge_text');
            $table->string('badge_type')->default('green'); // green | blue | orange
            $table->string('bg_from')->default('#fff8e1');
            $table->string('bg_to')->default('#ffecb3');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('products'); }
};
