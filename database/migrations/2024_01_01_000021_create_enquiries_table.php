<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('product_interest')->nullable();
            $table->string('country')->nullable();
            $table->string('quantity')->nullable();
            $table->text('message');
            $table->string('status')->default('new'); // new, read, replied, archived
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
