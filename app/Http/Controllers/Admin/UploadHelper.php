<?php

namespace App\Http\Controllers\Admin;

use App\Support\PublicImage;
use Illuminate\Http\UploadedFile;

/** @deprecated Use PublicImage directly */
class UploadHelper
{
    public static function storeImage(UploadedFile $file, string $folder): string
    {
        return PublicImage::store($file, $folder);
    }

    public static function deleteIfExists(?string $path): void
    {
        PublicImage::delete($path);
    }
}
