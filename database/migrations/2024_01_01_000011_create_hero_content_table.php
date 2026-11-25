<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('hero_content', function (Blueprint $table) {
            $table->id();
            $table->string('badge_text');
            $table->string('title_line1');
            $table->string('title_highlight');
            $table->string('title_line2');
            $table->string('title_line3');
            $table->text('subtitle');
            $table->string('btn_primary_text');
            $table->string('btn_secondary_text');
            $table->string('stat1_number');
            $table->string('stat1_label');
            $table->string('stat2_number');
            $table->string('stat2_label');
            $table->string('stat3_number');
            $table->string('stat3_label');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('hero_content'); }
};
