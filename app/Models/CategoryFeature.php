<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryFeature extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function value()
    {
        return $this->hasMany(CategoryFeatureValue::class);
    }



    public function categoryFeatureValue()
    {
        return $this->hasMany(CategoryFeatureValue::class);
    }

}
