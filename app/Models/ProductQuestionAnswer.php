<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductQuestionAnswer extends Model
{
    protected $guarded = [];

    public function answerVoites()
    {
        return $this->hasMany(ProductQuestionAnswerVote::class,'product_question_answer_id','id');
    }

    public function answerVotesLikeCount()
    {
        return $this->answerVoites()->where('status', 'like');
    }
    public function answerVotesDisLikeCount()
    {
        return $this->answerVoites()->where('status', 'dislike');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
