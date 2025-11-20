<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductQuestion extends Model
{
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answer()
    {
        return $this->hasMany(ProductQuestionAnswer::class,'product_question_id','id');
    }

    public function votes()
    {
     return $this->hasMany(ProductQuestionVoite::class);
    }
}
