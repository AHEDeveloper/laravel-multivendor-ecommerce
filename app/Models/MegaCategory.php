<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MegaCategory extends Model
{
    protected $guarded = [];

    public function megaFeature()
    {
        return $this->hasMany(MegaFeature::class);
    }
}
