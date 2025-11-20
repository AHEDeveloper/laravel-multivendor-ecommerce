<?php

namespace App\Repositories\admin;

use App\Models\Product;
use App\Models\ProductFeatureValue;
use App\Models\ProductImag;
use App\Models\ProductVideo;
use App\Models\SeoItem;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductAdminRepository implements ProductAdminRepositoryInterface
{
    use UploadFile;
    public function submit($formData, $productId, $photos, $coverImage,$storyFileName)
    {
        DB::transaction(function () use ($formData, $productId, $photos, $coverImage,$storyFileName) {
            $product = $this->submitToProduct($formData, $productId);
            $this->submitToSeoItem($formData, $product);
            $this->submitToProductImage($photos, $product->id, $coverImage);
            $this->saveImage($photos, $product->id);
            $this->productVideo($product->id,$storyFileName);
        });
    }

    public function submitToProduct($formData, $productId)
    {

        return Product::query()->updateOrCreate(
            [
                'id' => $productId
            ],
            [
                'name' => $formData['name'],
                'price' => $formData['price'],
                'discount' => $formData['discount'],
                'stock' => $formData['stock'],
                'featured' => $formData['featured'],
                'discount_duration' => $formData['discount_duration'],
                'seller_id' => $formData['sellerId'],
                'category_id' => $formData['categoryId'],
                'p_code' => config('app.name') . '-' . $this->generateProductCode()
            ]
        );
    }

    public function submitToSeoItem($formData, $product)
    {
        SeoItem::query()->updateOrCreate(
            [
                'type' => 'product',
                'ref_id' => $product->id
            ],
            [
                'slug' => $formData['slug'],
                'meta_title' => $formData['meta_title'],
                'meta_description' => $formData['meta_description']

            ]
        );
    }

    public function submitToProductImage($photos, $productId, $coverImage)
    {
        foreach ($photos as $index => $photo) {
            $path = pathinfo($photo->hashName(), PATHINFO_FILENAME) . '.webp';

            ProductImag::query()->create(
                [
                    'path' => $path,
                    'product_id' => $productId,
                    'is_cover' => $index == $coverImage,

                ]
            );
        }
    }

    public function saveImage($photos, $productId)
    {
        foreach ($photos as $photo) {
            $this->uploadImageInWebFormat($photo, $productId, 100, 100, 'small');
            $this->uploadImageInWebFormat($photo, $productId, 300, 300, 'medium');
            $this->uploadImageInWebFormat($photo, $productId, 800, 800, 'large');
        }
    }

    public function productVideo($productId,$storyFileName)
    {
        ProductVideo::query()->create([
            'path' => $storyFileName,
            'product_id' => $productId
        ]);
    }

    public function generateProductCode()
    {
        do {
            $randomCode = rand(1000, 1000000);
            $checkCode = Product::query()->where('p_code', $randomCode)->first();
        } while ($checkCode);
        return $randomCode;
    }

    public function submitProductContent($formData,$productId)
    {

        Product::query()->where('id',$productId)->update([
            'short_description' => $formData['short_description'],
            'long_description' => $formData['long_description']
        ]);
    }

    public function removeProduct($product)
    {
        DB::transaction(function () use ($product) {
            $product->delete();
            SeoItem::query()->where('ref_id', $product->id)->delete();
            ProductImag::query()->where('product_id',$product->id)->delete();
            File::deleteDirectory('products/'.$product->id);
        });

    }

    public function removeOldPhoto($productImage, $productId)
    {
        $productImage->delete();
        \Illuminate\Support\Facades\File::delete(public_path('products/' . $productId . '/' . 'small/' . $productImage->path));
        \Illuminate\Support\Facades\File::delete(public_path('products/' . $productId . '/' . 'medium/' . $productImage->path));
        \Illuminate\Support\Facades\File::delete(public_path('products/' . $productId . '/' . 'large/' . $productImage->path));
    }

    public function setCoverOldImage($photoId,$productId)
    {
        ProductImag::query()->where('product_id', $productId)->update(['is_cover' => false]);
        ProductImag::query()->where([
            'id' => $photoId,
            'product_id' => $productId
        ])->update(['is_cover' => true]);

    }

    public function submitProductFeature($formData, $productId)
    {

        foreach ($formData as $value) {
            list($featureId, $featureValueId) = explode('_', $value);
            ProductFeatureValue::query()->updateOrCreate(
                [
                    'product_id' => $productId,
                    'category_feature_id' => $featureId,
                ],
                [
                    'category_feature_value_id' => $featureValueId
                ]
            );
        }
    }
}
