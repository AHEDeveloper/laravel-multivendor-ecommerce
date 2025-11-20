<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MegaValue extends Model
{
    protected $guarded = [];

    public function megaFeature()
    {
        return $this->belongsTo(MegaFeature::class);
    }
}
