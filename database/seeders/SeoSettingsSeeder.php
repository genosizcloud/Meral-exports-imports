<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SeoSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $seo = [
            ['key' => 'seo_site_title',       'value' => 'Meral Exports & Imports Pvt Ltd – Premium Food Exports from Kerala', 'group' => 'seo'],
            ['key' => 'seo_title_separator',  'value' => ' | ', 'group' => 'seo'],
            ['key' => 'seo_description',      'value' => 'Meral Exports is a leading food export company from Kerala, India. We supply premium Basmati rice, frozen seafood, pulses, snacks, groceries and fresh fish to 30+ countries worldwide. ISO certified, FSSAI compliant.', 'group' => 'seo'],
            ['key' => 'seo_keywords',         'value' => 'food export Kerala, basmati rice export, frozen fish export, pulses export India, Kerala snacks export, Meral Exports, food supplier India, FSSAI certified food export', 'group' => 'seo'],
            ['key' => 'seo_og_image',         'value' => '', 'group' => 'seo'],
            ['key' => 'seo_og_type',          'value' => 'website', 'group' => 'seo'],
            ['key' => 'seo_twitter_card',     'value' => 'summary_large_image', 'group' => 'seo'],
            ['key' => 'seo_twitter_site',     'value' => '', 'group' => 'seo'],
            ['key' => 'seo_robots',           'value' => 'index, follow', 'group' => 'seo'],
            ['key' => 'seo_canonical_url',    'value' => 'https://meralexports.com', 'group' => 'seo'],
            ['key' => 'seo_google_analytics', 'value' => '', 'group' => 'seo'],
            ['key' => 'seo_gtm_id',           'value' => '', 'group' => 'seo'],
            ['key' => 'seo_google_verify',    'value' => '', 'group' => 'seo'],
            ['key' => 'seo_bing_verify',      'value' => '', 'group' => 'seo'],
            ['key' => 'seo_schema_founded',   'value' => '2010', 'group' => 'seo'],
            ['key' => 'seo_schema_country',   'value' => 'IN', 'group' => 'seo'],
            ['key' => 'seo_schema_locality',  'value' => 'Cochin', 'group' => 'seo'],
            ['key' => 'seo_schema_postal',    'value' => '682001', 'group' => 'seo'],
        ];
        foreach ($seo as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
