<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MegaFeature extends Model
{
    protected $guarded = [];
    public function megaCategory()
    {
        return $this->belongsTo(MegaCategory::class);
    }

    public function megaValue()
    {
        return $this->hasMany(MegaValue::class);
    }
}
