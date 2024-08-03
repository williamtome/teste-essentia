<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class ImageService
{
    public function upload(?UploadedFile $image): ?string
    {
        $imageUrl = null;
        $imageName = time().'.'.$image?->extension();

        if (!is_null($image) && $image->isValid()) {
            $imageUrl = $image->storeAs('public', $imageName);
        }

        return $imageUrl;
    }
}
