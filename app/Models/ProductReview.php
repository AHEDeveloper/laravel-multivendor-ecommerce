<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    //
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public  function votes()
    {
        return $this->hasMany(ProductReviewVote::class);
    }

    public function countVotesLike()
    {
        return $this->votes()->where('status','=','like')->count();
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

}
