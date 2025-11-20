<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait UploadFile
{
    protected function uploadImageInWebFormat($photo, $productId, $width, $height, $folder)
    {
        $path = public_path('products/' . $productId . '/' . $folder);
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $manager = new ImageManager(new Driver());
        $manager->read($photo->getRealPath())
            ->scale($width, $height)
            ->toWebp()
            ->save($path . '/' . pathinfo($photo->hashName(), PATHINFO_FILENAME) . '.webp');
    }

    protected function uploadImageWebFormatBlog($photo,$folder)
    {
        $path = public_path('blog/'.$folder);
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $manager = new ImageManager(new Driver());
        $manager->read($photo->getRealPath())
            ->toWebp()
            ->save($path . '/' . pathinfo($photo->hashName(), PATHINFO_FILENAME) . '.webp');
    }

    protected function uploadeImageWebformatVeBlog($photo,$blogId,$width,$height,$folder)
    {
        if ($photo)
        {
            $path = public_path('blog/' . $blogId . '/' .$folder);
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $manager = new ImageManager(new Driver());
            $manager->read($photo->getRealPath())
                ->scale($width, $height)
                ->toWebp()
                ->save($path . '/' . pathinfo($photo->hashName(), PATHINFO_FILENAME) . '.webp');
        }
    }

    protected function uploadImageInWebFormatCategory($photo, $categoryId, $width, $height, $folder)
    {
            if ($photo)
            {
                $path = public_path('categorys/' . $categoryId . '/' . $folder);
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }

                $manager = new ImageManager(new Driver());
                $manager->read($photo->getRealPath())
                    ->scale($width, $height)
                    ->toWebp()
                    ->save($path . '/' . pathinfo($photo->hashName(), PATHINFO_FILENAME) . '.webp');
            }
    }

    protected function uploadImageInWebFormatUser($photo, $userId, $width, $height)
    {
        if ($photo)
        {
            $path = public_path('/avatars/' . $userId . '/');
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $manager = new ImageManager(new Driver());
            $manager->read($photo->getRealPath())
                ->scale($width, $height)
                ->toWebp()
                ->save($path . pathinfo($photo->hashName(), PATHINFO_FILENAME) . '.webp');
        }
    }






//    protected function uploadImageInWebFormatUser($photo, $userId, $width, $height, $folder)
//    {
//        if ($photo)
//        {
//            $path = public_path('users/' . $userId . '/' . $folder);
//            if (!file_exists($path)) {
//                mkdir($path, 0755, true);
//            }
//            $photo = $photo.'.webp';
//            Storage::disk('public')->put($path.'/'.$photo);
//        }
//    }


}
