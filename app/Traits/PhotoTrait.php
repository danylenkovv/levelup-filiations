<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait PhotoTrait
{
    /**
     * Save the uploaded photo and return its path.
     *
     * @param \Illuminate\Http\UploadedFile $photo
     * @return string
     */
    public function savePhoto($photo)
    {
        $fileName = time() . '_' . $photo->getClientOriginalName();
        Storage::disk('public')->put('uploads/' . $fileName, file_get_contents($photo));
        return 'uploads/' . $fileName;
    }

    /**
     * Delete the photo if it exists and is not the default.
     *
     * @param string $photoUrl
     * @return void
     */
    public function deletePhoto($photoUrl)
    {
        if ($photoUrl !== 'uploads/default.jpg' && Storage::disk('public')->exists($photoUrl)) {
            Storage::disk('public')->delete($photoUrl);
        }
    }
}
