<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;

// use Illuminate\Support\Facades\Response;

trait ImageUploadTrait
{
    /**
     * to get data for responseCode
     * @author Nita Bopche
     * @email <neetabopche1603@gmail.com>
     *
     */

     public function uploadMultipleImages(array $images, $folder = 'images')
     {
         $imagePaths = [];

         foreach ($images as $image) {
             // Generate a unique filename for each image
             $name = "img_" . uniqid() . '.' . $image->getClientOriginalExtension();

             // Store the image in the specified folder inside the public directory
             $path = $image->storeAs("public/$folder", $name);

             // Add the full path of the uploaded image to the array
             $imagePaths[] = "storage/" . str_replace('public/', '', $path);
         }

         return $imagePaths;
     }


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


    // public function uploadImage(UploadedFile $image, $folder = 'images', $filename = null, $cropData = null)
    // {
    //     // Generate a unique filename if none is provided
    //     $name = $filename ?: "img_" . date('dmYHis') . '.' . $image->getClientOriginalExtension();

    //     // Store the image in the specified folder inside the public directory
    //     $path = $image->storeAs("public/$folder", $name);

    //     // If crop data is provided, crop the image
    //     if ($cropData) {
    //         $img = Image::make(storage_path('app/' . $path));
    //         $img->crop($cropData['width'], $cropData['height'], $cropData['x'], $cropData['y']);
    //         $img->save();
    //     }

    //     // Return the full path including the 'storage/' directory
    //     return "storage" . str_replace('public/', '', $path);
    // }


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
