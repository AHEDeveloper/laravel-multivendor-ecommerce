<?php

namespace App\Livewire\Client\Product\ProductTab;

use App\Models\CategoryFeatureValue;
use App\Models\Product;
use App\Models\ProductFeatureValue;
use App\Models\ProductQuestion;
use App\Models\ProductQuestionAnswer;
use App\Models\ProductQuestionAnswerVote;
use App\Models\ProductReview;
use App\Models\ProductReviewVote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Component;
use function Laravel\Prompts\alert;

class Index extends Component
{
    //variable
    public $productId;
    public $question;
    public $questionId;
    public $productQuestionId;

    public $answerLike;
    public $answerDisLike;
    public $textAnswer;
    public $answer = false;
    public $productReviewCount;
    public $productQuestionCount;
    public $averageRating;
    public $star;
    public $activeTab = 1;
    public $shortDescription;
    public $longDescription;
    public $description;
    public $countLimitReview = 2;
    public $countLimitQuestion = 2;
    public $reviewFilterId;
    public $questionFilterId;
    public $countLike = 0;


    //array
    public $productReviews;
    public $productQuestions;
    public $features;
    public $loadingComments;
    // + and -
    public $positiveInput = '';
    public $positiveItem = [];
    public $negativeInput = '';
    public $negativeItem = [];

    public function mount()
    {
        app()->setLocale('fa');

        $product = Product::query()->where('id', $this->productId);
        $this->shortDescription = $product->pluck('short_description')->first();
        $this->productReviewCount = ProductReview::query()
            ->where('product_id', $this->productId)
            ->where('status', 'approved')
            ->count();

        $this->productQuestionCount = ProductQuestion::query()
            ->where('product_id', $this->productId)
            ->count();


        $average = ProductReview::query()
            ->where('status', 'approved')
            ->where('product_id', $this->productId)
            ->avg('rating');
        $this->averageRating = rtrim(rtrim(number_format($average, 2, '.', ''), '0'), '.');


    }

    public function changeTab($number)
    {
        $this->activeTab = $number;
        $product = Product::query()->where('id', $this->productId);
//        dd($product);
        if ($number == 1) {
            $this->shortDescription = $product->pluck('short_description')->first();
        } elseif ($number == 2) {
            $this->longDescription = $product->pluck('long_description')->first();
        } elseif ($number == 3) {
            $productId = $product->pluck('id')->first();
            $this->features = ProductFeatureValue::query()
                ->where('product_id', $productId)
                ->with('categoryFeature', 'CategoryFeatureValue')
                ->get();

        } elseif ($number == 4) {
            $this->reviewFilter(1);


        } elseif ($number == 5) {
            $this->questionFilter(1);
        }

    }

    public function questionFilter($number)
    {
        $this->questionFilterId = $number;
        $queryQuestion = ProductQuestion::query()
            ->with(['user', 'answer' => function ($query) {
                $query->withCount(['answerVotesLikeCount as like_votes_count']);
                $query->withCount(['answerVotesDisLikeCount as dislike_votes_count']);
            }])
            ->where('product_id', $this->productId)
            ->limit($this->countLimitQuestion);

        if ($number == 1)
        {
            $this->productQuestions = $queryQuestion
                ->withCount('answer') // تعداد پاسخ‌ها برای هر سوال
                ->orderByDesc('answer_count') // مرتب سازی بر اساس بیشترین پاسخ
                ->get();
        } elseif ($number == 2)
        {
            $this->productQuestions = $queryQuestion
                ->latest()
                ->get();
        }

    }

    public function reviewFilter($number)
    {
        $this->reviewFilterId = $number;
        $queryReview = ProductReview::query()
            ->with('user')
            ->withCount(["votes as like" => function ($query) {
                $query->where('status', 'like');
            },
                "votes as dislike" => function ($query) {
                    $query->where('status', 'dislike');
                }
            ])
            ->where('product_id', $this->productId)
            ->where('status', 'approved')
            ->limit($this->countLimitReview);
        if ($number == 1) {
            $this->productReviews = $queryReview
                ->whereHas('user.orders', function ($query) {
                    $query->where('status', 'completed');
                })
                ->whereHas('user.orders.orderItems', function ($query) {
                    $query->where('product_id', $this->productId);
                })
                ->get();
        }
        elseif ($number == 2)
        {
            $this->productReviews = $queryReview
                ->orderByDesc('like')
                ->get();


        }
        elseif ($number == 3)
        {
            $this->productReviews = $queryReview
                ->latest()
                ->get();
        }
    }

    public function addToLimitReview()
    {
        $this->countLimitReview = 100;
        $this->reviewFilter($this->reviewFilterId);
    }

    public function addToLimitQuestion()
    {
        $this->countLimitQuestion = 100;
        $this->questionFilter($this->questionFilterId);
    }

    public function getProductFeature($productId)
    {
        $this->features = ProductFeatureValue::query()
            ->where('product_id', $productId)
            ->with(['categoryFeature', 'categoryFeatureValue'])
            ->get();
    }

    public function submitProductReview()
    {
        $this->validate([
            'description' => 'required|min:10|max:10000',
        ], [
            'description.required' => 'این فیلد ضروری است',
            'description.min' => 'کارکتر های شما کمتر از 10 هست',
            'description.max' => 'کارکتر های شما بیشتر از 10000 هست',
        ]);

        ProductReview::query()->create([
            'comment' => $this->description,
            'positive' => implode(',', $this->positiveItem),
            'negative' => implode(',', $this->negativeItem),
            'rating' => $this->star,
            'product_id' => $this->productId,
            'user_id' => Auth::id()
        ]);
        $this->reset('description', 'star');
        $this->negativeItem = [];
        $this->positiveItem = [];
    }

    public function addItem($type)
    {
        $inputField = $type === 'positive' ? 'positiveInput' : 'negativeInput';
        $itemField = $type === 'positive' ? 'positiveItem' : 'negativeItem';
        $this->validate([
            $inputField => 'required|min:5|max:50'
        ], [
            $inputField . '.required' => 'این فیلد ضروری است',
            $inputField . '.min' => 'کارکتر های شما کمتر از 5 هست',
            $inputField . '.max' => 'کارکتر های شما بیشتر از 50 هست'
        ]);

        $this->{$itemField}[] = $this->{$inputField};
        $this->{$inputField} = '';

    }

    public function removeItem($type, $index)
    {
        $itemField = $type === 'positiveItem' ? 'positiveItem' : 'negativeItem';
        array_splice($this->{$itemField}, $index, 1);
    }

    public function votes($type, $review_id)
    {
        ProductReviewVote::query()->updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_review_id' => $review_id
            ],
            [
                'status' => $type
            ]
        );
        $this->reviewFilter($this->reviewFilterId);
    }

    public function submitQuestion($formData)
    {
        $validator = Validator::make($formData, [
            'question' => 'required|min:10|max:10000'
        ],
            [
                '*.required' => 'این فیلد ضرورری هست',
                '*.min' => 'لطفا بیشتر از 10 کارکتر استفاده کنید',
                '*.max' => 'لطفا کمتر از 10,000 کارکتر استفاده کنید'
            ]);
        $validator->validate();
        ProductQuestion::query()->create([
            'question' => $formData['question'],
            'product_id' => $this->productId,
            'user_id' => Auth::id()
        ]);
        $this->resetValidation();
        $this->reset('question');
        $this->questionFilter($this->questionFilterId);

    }

    public function submitAnswerQuestion($formData)
    {
        $validator = Validator::make($formData, [
            'textAnswer' => 'required|min:10|max:10000'
        ],
            [
                '*.required' => 'این فیلد ضرورری هست',
                '*.min' => 'لطفا بیشتر از 10 کارکتر استفاده کنید',
                '*.max' => 'لطفا کمتر از 10,000 کارکتر استفاده کنید'
            ]);
        $validator->validate();
        ProductQuestionAnswer::query()->create([
            'answer' => $formData['textAnswer'],
            'product_question_id' => $this->questionId,
            'product_id' => $this->productId,
            'user_id' => Auth::id()
        ]);
        $this->resetValidation();
        $this->reset('textAnswer');
        $this->reset('question');

        $this->questionId = null;
        $this->answer = false;
        $this->questionFilter($this->questionFilterId);

    }

    public function answerQuestion($question_id)
    {
        $this->questionId = $question_id;
        $this->answer = true;
        $this->questionFilter($this->questionFilterId);
    }

    public function answerVoites($type, $answer_id)
    {
        ProductQuestionAnswerVote::query()->updateOrCreate([
            'product_id' => $this->productId,
            'product_question_answer_id' => $answer_id
        ],
            [
                'status' => $type
            ]);
        $this->questionFilter($this->questionFilterId);
    }

    public function render()
    {
        return view('livewire.client.product.product-tab.index');
    }
}
