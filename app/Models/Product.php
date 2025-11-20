<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;


class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function coverImage()//برای جدول
    {
        return $this->belongsTo(ProductImag::class, 'id', 'product_id')->where('is_cover', '=', true);
    }

    public function coverImageNull()//برای جدول
    {
        return $this->belongsTo(ProductImag::class, 'id', 'product_id')->where('is_cover', '=', false);
    }

    public function seo()
    {
        return $this->belongsTo(SeoItem::class,'id','ref_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImag::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function feature()
    {
        return $this->hasMany(ProductFeatureValue::class);
    }

    public function video()//برای جدول
    {
        return $this->belongsTo(ProductVideo::class, 'id', 'product_id');
    }

    public function question()
    {
        return $this->hasMany(ProductQuestion::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class,'product_id','id');
    }

    public function productFilter()
    {
        return $this->hasMany(ProductFilter::class);
    }

    public function favorite()
    {
        return $this->belongsTo(Favorite::class,'id','product_id');
    }


}
