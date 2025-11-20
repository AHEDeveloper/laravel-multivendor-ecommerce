<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeatureValue extends Model
{
    protected $guarded = [];

    public function submit($formData, $productId)
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

    public function categoryFeature()
    {
        return $this->belongsTo(CategoryFeature::class);
    }
    public function categoryFeatureValue()
    {
        return $this->belongsTo(CategoryFeatureValue::class);
    }

//    public function categoryFeatureHas()
//    {
//        return $this->hasMany(CategoryFeature::class);
//    }
//    public function categoryFeatureValueHas()
//    {
//        return $this->hasMany(CategoryFeatureValue::class);
//    }

}


