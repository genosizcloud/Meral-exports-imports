<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id','name','description','emoji','image','badge_text','badge_type',
        'bg_from','bg_to','sort_order','is_active','is_featured',
    ];

    protected $casts = ['is_active' => 'boolean', 'is_featured' => 'boolean'];

    protected $appends = ['slug'];

    public function getSlugAttribute(): string
    {
        return \Illuminate\Support\Str::slug($this->name) ?: (string)$this->id;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
