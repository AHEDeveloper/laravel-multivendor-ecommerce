<?php

namespace App\Repositories\admin;

use App\Models\Category;
use App\Models\CategoryFeature;
use App\Models\CategoryFeatureValue;
use App\Models\CategoryImage;
use App\Models\SeoItem;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\DB;

class CategoryAdminRepository implements CategoryAdminRepositoryInterface
{
use UploadFile;
    public function submit($formData, $categoryId,$photo)
    {
        DB::transaction(function () use ($formData, $categoryId,$photo){
           $category = $this->submitCategory($formData, $categoryId);
           $this->submitImage($photo,$category->id);
           $this->saveImag($photo,$category->id);
        });
    }

    public function submitCategory($formData, $categoryId)
    {
        if ($formData['parent_id'] == "") {
            $formData['parent_id'] = null;
        }

        return Category::query()->updateOrCreate(
            [
                'id' => $categoryId
            ],
            [
                'name' => $formData['name'],
                'category_id' => $formData['parent_id']
            ]
        );
    }

    public function submitImage($photo,$categoryId)
    {
        if ($photo)
        {
            $path = pathinfo($photo->hashName(),PATHINFO_FILENAME).'.webp';
            CategoryImage::query()->create(
                [
                    'path' => $path,
                    'category_id' => $categoryId
                ]
            );
        }
    }

    public function saveImag($photo,$categoryId)
    {
        if ($photo)
        {
            $this->uploadImageInWebFormatCategory($photo,$categoryId,100,100,'small');
            $this->uploadImageInWebFormatCategory($photo,$categoryId,300,300,'medium');
            $this->uploadImageInWebFormatCategory($photo,$categoryId,800,800,'large');
            $photo->delete();
        }
    }

//    public function seoItem($categoryId)
//    {
//        SeoItem::query()->updateOrCreate(
//            [
//                'ref_id' => $categoryId,
//                'type' => 'category'
//            ],
//            [
//                ''
//            ]
//        );
//    }

    public function submitCategoryFeature($formData, $categoryId, $featureId)
    {
        CategoryFeature::query()->updateOrCreate(
            [
                'id' => $featureId
            ],
            [
                'name' => $formData['name'],
                'category_id' => $categoryId
            ]
        );
    }

    public function submitCategoryFeatureValue($formData,$valueId,$featureId)
    {
        CategoryFeatureValue::query()->updateOrCreate(
            [
                'id' => $valueId
            ]
            ,
            [
            'value' => $formData['value'],
            'mega_code' => $formData['megaCode'],
            'category_feature_id' => $featureId
            ]);
    }

}
