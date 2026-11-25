<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroContent extends Model
{
    protected $table = 'hero_content';
    protected $fillable = [
        'badge_text','title_line1','title_highlight','title_line2','title_line3',
        'subtitle','btn_primary_text','btn_secondary_text',
        'stat1_number','stat1_label','stat2_number','stat2_label','stat3_number','stat3_label',
    ];
}
