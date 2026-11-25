<?php

use App\Support\PublicImage;

if (! function_exists('public_image_url')) {
    function public_image_url(?string $path, ?string $fallback = null): ?string
    {
        return PublicImage::url($path) ?? $fallback;
    }
}
