<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\Response;

trait ImageUploadTrait
{
    /**
     * to get data for responseCode
     * @author Nita Bopche
     * @email <neetabopche1603@gmail.com>
     *
     */


    public function uploadImage(UploadedFile $image, $folder = 'images', $filename = null)
    {
        // Generate a unique filename if none is provided
        $name = $filename ?: "img_" . date('dmYHis') . '.' . $image->getClientOriginalExtension();

        // // Store the image in the specified folder inside the public directory
        // $path = $image->storeAs($folder, $name, 'public');

        // return $path;

        $path = $image->storeAs("public/$folder", $name);

        // Return the full path including the 'storage/' directory
        return "storage" . str_replace('public/', '', $path);
    }

    /**
     * Delete an image from the public folder.
     *
     * @param string $path
     * @return bool
     */
    public function deleteImage($path)
    {
        // return Storage::disk('public')->delete($path);

        // Remove 'storage/' from the beginning of the path
        $path = str_replace('storage/', '', $path);

        // Delete the image using the corrected path
        return Storage::disk('public')->delete($path);
    }
}
