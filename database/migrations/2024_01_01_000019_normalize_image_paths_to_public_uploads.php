<?php

use App\Models\SiteSetting;
use App\Support\PublicImage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\File;

return new class extends Migration {
    public function up(): void
    {
        $seoDir = public_path('uploads/seo');
        if (! is_dir($seoDir)) {
            mkdir($seoDir, 0755, true);
        }

        // Move legacy OG image from public root into public/uploads/seo/
        if (is_file(public_path('og-image.jpg')) && ! is_file(public_path('uploads/seo/og-image.jpg'))) {
            File::move(public_path('og-image.jpg'), public_path('uploads/seo/og-image.jpg'));
        }

        $og = SiteSetting::where('key', 'seo_og_image')->first();
        if ($og && $og->value) {
            $relative = PublicImage::relativePath($og->value);
            if ($relative === 'og-image.jpg') {
                $relative = 'uploads/seo/og-image.jpg';
            }
            if ($relative) {
                $og->update(['value' => $relative]);
            }
        }
    }

    public function down(): void
    {
        // no rollback needed
    }
};
