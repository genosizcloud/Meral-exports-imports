<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'title', 'image', 'category_id', 'sort_order', 'is_active', 'is_featured',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
