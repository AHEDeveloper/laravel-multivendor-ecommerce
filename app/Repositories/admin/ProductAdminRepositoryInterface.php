<?php

namespace App\Repositories\admin;

interface ProductAdminRepositoryInterface
{
    public function submit($formData, $productId, $photos, $coverImage,$storyFileName);

    public function submitToProduct($formData, $productId);

    public function submitToSeoItem($formData, $product);

    public function submitToProductImage($photos, $productId, $coverImage);

    public function saveImage($photos, $productId);
    public function productVideo($productId,$storyFileName);

//    public function resizeImage($photo, $productId, $width, $height, $folder);

    public function generateProductCode();

    public function submitProductContent($formData, $productId);

    public function removeProduct($product);

    public function removeOldPhoto($productImage, $productId);

    public function setCoverOldImage($photoId,$productId);

    public function submitProductFeature($formData, $productId);

}
