<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];



    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }


    public function childrenFeature()
    {
        return $this->hasMany(CategoryFeature::class);
    }

    public function cover()
    {
        return $this->belongsTo(CategoryImage::class,'id','category_id');
    }

    public function category()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);

    }


}
