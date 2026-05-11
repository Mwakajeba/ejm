<?php

namespace App\Support;

use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

class PartnerAssets
{
    /**
     * Public URLs for image files in `public/brands`, sorted by filename.
     *
     * @return list<string>
     */
    public static function logoUrls(): array
    {
        $dir = public_path('brands');
        if (! File::isDirectory($dir)) {
            return [];
        }

        return collect(File::files($dir))
            ->filter(fn (SplFileInfo $file): bool => (bool) preg_match('/\.(png|jpe?g|webp|gif|svg)$/i', $file->getFilename()))
            ->map(fn (SplFileInfo $file): string => asset('brands/'.$file->getFilename()))
            ->sort()
            ->values()
            ->all();
    }
}
