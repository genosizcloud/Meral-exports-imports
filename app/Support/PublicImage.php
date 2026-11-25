<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;

class PublicImage
{
    /** Store file under public/uploads/{folder}/ and return relative path. */
    public static function store(UploadedFile $file, string $folder, ?string $fixedName = null): string
    {
        $dir = public_path('uploads/' . $folder);
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $name = $fixedName
            ? $fixedName . '.' . $file->getClientOriginalExtension()
            : uniqid('img_', true) . '.' . $file->getClientOriginalExtension();

        $file->move($dir, $name);

        return 'uploads/' . $folder . '/' . $name;
    }

    public static function delete(?string $path): void
    {
        $relative = self::relativePath($path);
        if (! $relative) {
            return;
        }

        $full = public_path($relative);
        if (is_file($full)) {
            unlink($full);
        }
    }

    /** Normalize DB value to path relative to public/ (e.g. uploads/products/foo.jpg). */
    public static function relativePath(?string $path): ?string
    {
        if (empty($path)) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            $path = parse_url($path, PHP_URL_PATH) ?? '';
        }

        $path = ltrim($path, '/');

        return $path !== '' ? $path : null;
    }

    /** Full public URL for a stored image path. */
    public static function url(?string $path): ?string
    {
        $relative = self::relativePath($path);

        return $relative ? asset($relative) : null;
    }
}
