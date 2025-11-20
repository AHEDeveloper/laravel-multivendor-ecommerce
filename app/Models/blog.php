<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $guarded = [];

    public function cover()
    {
        return $this->belongsTo(BlogImage::class,'id', 'blog_id');
    }
}
