<div>
    <section class="product-desc">
        <div class="container-fluid">
            <div class="product-desc-tab">
                <ul class="nav justify-content-start" id="productTab" role="tablist">
                    <li class="nav-item" wire:click="changeTab(1)">
                        <button class=" waves-effect waves-light {{$activeTab == 1 ? 'active' : ''}}"
                                data-bs-target="#productDescLess-pane" data-bs-toggle="tab" id="productDescLess"
                                type="button">
                            توضیحات کالا
                        </button>
                    </li>
                    <li class="nav-item active" wire:click="changeTab(2)">
                        <button class=" waves-effect waves-light {{$activeTab == 2 ? 'active' : ''}}"
                                data-bs-target="#productDesc-pane" data-bs-toggle="tab" id="productDesc" type="button">
                            مشخصات کالا
                        </button>
                    </li>
                    <li class="nav-item" wire:click="changeTab(3)">
                        <button class=" waves-effect waves-light {{$activeTab == 3 ? 'active' : ''}}"
                                data-bs-target="#productTable-pane" data-bs-toggle="tab" id="productTable"
                                type="button">
                            توضیحات تکمیلی
                        </button>
                    </li>
                    <li class="nav-item" wire:click="changeTab(4)">
                        <button class="d-flex waves-effect waves-light {{$activeTab == 4 ? 'active' : ''}}"
                                data-bs-target="#productComment-pane" data-bs-toggle="tab" id="productComment"
                                type="button">
                            نظرات <span class="badge main-color-one-bg ms-2 lh-sm">{{$productReviewCount}}</span>
                        </button>
                    </li>
                    <li class="nav-item" wire:click="changeTab(5)">
                        <button class="d-flex waves-effect waves-light {{$activeTab == 5 ? 'active' : ''}}"
                                data-bs-target="#productAnswer-pane" data-bs-toggle="tab" id="productAnswer"
                                type="button">
                            پرسش و پاسخ <span
                                class="badge main-color-one-bg ms-2 lh-sm">{{$productQuestionCount}}</span>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="row mt-4 pt-2">
                <div class="col-xl-9">
                    <div class="content-box">
                        <div class="product-descs" id="prodesc">
                            <div class="product-desc">
                                <div class="product-desc-tab-content">
                                    <div class="tab-content" id="productTabContent">
                                        <div class="tab-pane fade {{$activeTab == 1 ? 'active' : ''}} show  product-desc-less-contents"
                                            wire:ignore.self id="productDescLess-pane">
                                            <div class="product-desc-content">
                                                <h6 class="font-22 mb-2 title-font title-line-bottom">معرفی محصول</h6>
                                                <p>
                                                    {{$shortDescription}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade {{$activeTab == 2 ? 'active' : ''}} product-desc-contents"
                                            id="productDesc-pane" wire:ignore.self>
                                            <div class="product-desc-content">
                                                <input class="read-more-state" id="readMore2" type="checkbox">
                                                <!-- والد بیشتر ، کمتر ، تمام متن توضیحات باید داخل این تگ قرار بگیرند -->
                                                <div class="read-more-wrap">
                                                    <h6 class="font-26 mb-2 title-font title-line-bottom">
                                                        توضیحات بیشتر برای این محصول

                                                    </h6>
                                                    <p>
                                                        {!! $longDescription !!}

                                                    </p>
                                                    <!-- پایان متن بیشتر -->
                                                </div>
                                                <!-- پایان والد بیشتر کمتر -->
                                                <label class="read-more-trigger" for="readMore2"></label>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade {{$activeTab == 3 ? 'active' : ''}}"
                                             id="productTable-pane" wire:ignore.self>
                                            <div class="tab-pane fade active show" role="tabpanel">
                                                <h6 class="font-26 mb-2 title-font title-line-bottom">مشخصات فنی</h6>
                                                @if($features)
                                                    @foreach($features as $feature)
                                                        <div class="box_list mt-4">
                                                            <div>
                                                                <ul class="param_list list-inline">
                                                                    <li class="list-inline-item col-md-3 pe-md-1 pe-md-3 p-0 m-0">
                                                                        <div class="box_params_list">
                                                                            <p class="block border_right_custom1">
                                                                                {{$feature->categoryFeature->name}}
                                                                            </p>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                                                        <div class="box_params_list">
                                                                            <p class="block border_right_custom2">
                                                                                {{$feature->categoryFeatureValue->value}}

                                                                            </p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane fade {{$activeTab == 4 ? 'active' : ''}} product-comment-content"
                                            id="productComment-pane" wire:ignore.self>

                                            <div class="comment-form">
                                                <h6 class="font-26 mb-2 title-font title-line-bottom">نظرت در مورد این
                                                    محصول چیه؟</h6>
                                                <p class="font-14 text-muted mt-2">برای ثبت نظر، از طریق دکمه افزودن
                                                    دیدگاه جدید
                                                    نمایید. اگر این محصول را قبلا خریده باشید، نظر شما به عنوان خریدار
                                                    ثبت خواهد شد.</p>
                                                {{--                                                <form wire:submit="submitProductReview(Object.fromEntries(new FormData($event.target)))">--}}
                                                <div class="row gy-4">
                                                    <div class="col-md-4">
                                                        <div class="product-rateing position-sticky top-0">
                                                            <div class="row gy-2 align-items-center">
                                                                <div class="number">
                                                                    <h4 class="fw-light">متوسط امتیاز ها</h4>
                                                                    <h2>{{$averageRating}}</h2>
                                                                    <div class="star">
                                                                        @if($averageRating < 1)

                                                                        @elseif($averageRating < 2)
                                                                            <i class="bi bi-star-fill"></i>
                                                                        @elseif($averageRating < 3)
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                        @elseif($averageRating < 4)
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                        @elseif($averageRating < 5)
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                        @else
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star-fill"></i>
                                                                            <i class="bi bi-star"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="my-3">امتیاز شما</label>
                                                                    <fieldset class="rating" id="commentRatings">

                                                                        <input id="star5" name="rating" required
                                                                               type="radio" wire:model="star"
                                                                               value="5">
                                                                        <label for="star5">5 stars</label>

                                                                        <input id="star4" name="rating" required
                                                                               type="radio" wire:model="star"
                                                                               value="4">
                                                                        <label for="star4">4 stars</label>

                                                                        <input id="star3" name="rating" required
                                                                               type="radio" wire:model="star"
                                                                               value="3">
                                                                        <label for="star3">3 stars</label>

                                                                        <input id="star2" name="rating" required
                                                                               type="radio" wire:model="star"
                                                                               value="2">
                                                                        <label for="star2">2 stars</label>

                                                                        <input id="star1" name="rating" required
                                                                               type="radio" wire:model="star"
                                                                               value="1">
                                                                        <label for="star1">1 star</label>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-floating">
                                                            <textarea class="form-control"
                                                                      id="floatingTextarea2"
                                                                      wire:model="description"
                                                                      name="description"
                                                                      placeholder="Leave a comment here"
                                                                      style="height: 150px"></textarea>
                                                                    @error('description')
                                                                    <div wire:loading.remove
                                                                         class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                                                                         role="alert">
                                                                        <button type="button" class="btn-close"
                                                                                data-bs-dismiss="alert"
                                                                                aria-label="Close">
                                                                            <svg> ...</svg>
                                                                        </button>
                                                                        <strong>خطا!! </strong> {{ $message }}</button>
                                                                    </div>
                                                                    @enderror
                                                                    <label for="floatingTextarea2">متن نظر!</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group mt-3">
                                                                    <label class="text-success mb-2 fw-bold font-16"
                                                                           for="tags-pos">نقاط قوت</label>
                                                                    <input type="text" wire:model="positiveInput"
                                                                           wire:keydown.enter="addItem('positive')"
                                                                           class="commentTags form-control"
                                                                           id="tags-pos"
                                                                           name="tags-pos"
                                                                           placeholder="با کلید اینتر اضافه کنید">
                                                                    @error('positiveInput')
                                                                    <div wire:loading.remove
                                                                         class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                                                                         role="alert">
                                                                        <button type="button" class="btn-close"
                                                                                data-bs-dismiss="alert"
                                                                                aria-label="Close">
                                                                            <svg> ...</svg>
                                                                        </button>
                                                                        <strong>خطا!! </strong> {{ $message }}</button>
                                                                    </div>
                                                                    @enderror
                                                                    <br>
                                                                    <tags class="tagify commentTags form-control"
                                                                          tabindex="-1">
                                                                        @if($positiveItem)
                                                                            @foreach($positiveItem as $index=>$positive)
                                                                                <tag title="lll" contenteditable="false"
                                                                                     spellcheck="false" tabindex="-1"
                                                                                     class="tagify__tag " value="lll">
                                                                                    <x title=""
                                                                                       wire:click="removeItem('positive',{{$index}})"
                                                                                       class="tagify__tag__removeBtn"
                                                                                       role="button"
                                                                                       aria-label="remove tag"></x>
                                                                                    <div>
                                                                                        <span
                                                                                            class="tagify__tag-text">{{$positive}}</span>
                                                                                    </div>
                                                                                </tag>
                                                                            @endforeach
                                                                        @endif
                                                                    </tags>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group mt-3">
                                                                    <label class="text-danger fw-bold mb-2 font-16"
                                                                           for="tags-neg">نقاط ضعف</label>
                                                                    <input wire:model="negativeInput"
                                                                           wire:keydown.enter="addItem('negative')"
                                                                           class="commentTags form-control"
                                                                           id="tags-neg"
                                                                           name="tags-neg"
                                                                           placeholder="با کلید اینتر اضافه کنید">
                                                                    @error('negativeInput')
                                                                    <div wire:loading.remove
                                                                         class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                                                                         role="alert">
                                                                        <button type="button" class="btn-close"
                                                                                data-bs-dismiss="alert"
                                                                                aria-label="Close">
                                                                            <svg> ...</svg>
                                                                        </button>
                                                                        <strong>خطا!! </strong> {{ $message }}</button>
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <tags class="tagify commentTags form-control"
                                                                      tabindex="-1">
                                                                    @if($negativeItem)
                                                                        @foreach($negativeItem as $index=>$negative)
                                                                            <tag title="lll" contenteditable="false"
                                                                                 spellcheck="false" tabindex="-1"
                                                                                 class="tagify__tag " value="lll">
                                                                                <x title=""
                                                                                   wire:click="removeItem('negative',{{$index}})"
                                                                                   class="tagify__tag__removeBtn"
                                                                                   role="button"
                                                                                   aria-label="remove tag"></x>
                                                                                <div><span
                                                                                        class="tagify__tag-text">{{$negative}}</span>
                                                                                </div>
                                                                            </tag>
                                                                        @endforeach
                                                                    @endif
                                                                </tags>
                                                            </div>

                                                            <div class="col-12">
                                                            @if(\Illuminate\Support\Facades\Auth::check())

                                                                    <button type="button" wire:click="submitProductReview"
                                                                            class="btn main-color-two-bg text-white px-5 btn-lg border-0">
                                                                        ثبت نظر
                                                                    </button>
                                                                @else
                                                                    <a type="button" href="{{route('client.auth.index')}}"
                                                                       class="btn main-color-two-bg text-white px-5 btn-lg border-0">
                                                                        ثبت نظر
                                                                    </a>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--                                                </form>--}}
                                            </div>
                                            <div class="box_filter mt-5 pb-3">
                                                <div class="row align-items-end">
                                                    <div class="col-md-4 bf1">
                                                        <h4 class="title-font title-line-bottom">نظرات کاربران</h4>
                                                    </div>
                                                    <div class="col-md-8 bf2">
                                                        <ul class="list-inline text-end mb-0">
                                                            <li class="list-inline-item title-font">مرتب سازی بر اساس
                                                                :
                                                            </li>

                                                            <li class="list-inline-item" wire:click="reviewFilter(1)">
                                                                <a class="{{$reviewFilterId==1 ? 'active_custom' : ''}}"
                                                                   href="javascript:void(0)">نظر خریداران</a>
                                                            </li>

                                                            <li class="list-inline-item" wire:click="reviewFilter(2)">
                                                                <a class="{{$reviewFilterId==2 ? 'active_custom' : ''}}"
                                                                   href="javascript:void(0)">مفیدترین نظرات</a>
                                                            </li>

                                                            <li class="list-inline-item" wire:click="reviewFilter(3)">
                                                                <a class="{{$reviewFilterId==3 ? 'active_custom' : ''}}"
                                                                   href="javascript:void(0)">جدیدترین نظرات</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="box_users_comment mt-3 p-4">
                                                @if($productReviews)
                                                    @foreach($productReviews as $review)
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <div class="box_message_light">
                                                                    <svg class="bi bi-cart3" fill="currentColor"
                                                                         height="16"
                                                                         viewBox="0 0 16 16" width="16"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                                                    </svg>
                                                                    @if ($review->user && $review->user->hasPurchasedProduct($review->product->id))
                                                                        خریدار
                                                                    @else
                                                                        کاربر
                                                                    @endif

                                                                </div>
                                                                <div class="box_shopping mt-lg-5 mt-3">
                                                                    <span>خریداری شده از :</span>
                                                                    <p>
                                                                        <i class="bi bi-shop"></i>
                                                                        <a href="javascript:void(0)">
                                                                            {{$review->product->seller->shop_name}}
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-9 pr-5" style="margin-top:-10px">
                                                                <div class="box_comment_header mt-4 mt-lg-0">
                                                                    <br>
                                                                    <span class="span2">توسط {{$review->user->name}} حدود {{$review->created_at->diffForHumans()}}
                                                </span>
                                                                </div>
                                                                <div class="border-bottom mt-3"></div>
                                                                <div class="row mt-4">
                                                                    <div class="col-md-6 evaluation-positive">
                                                                        <div class="list-inline">
                                                                            <span>نقاط قوت</span>
                                                                            @foreach(explode(',',$review->positive) as $positive)
                                                                                <div
                                                                                    class="list-inline-item ml-3">{{$positive}}</div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 evaluation-negative">
                                                                        <div class="list-inline">
                                                                            <span>نقاط ضعف</span>
                                                                            @foreach(explode(',',$review->negative) as $negative)
                                                                                <div
                                                                                    class="list-inline-item ml-3">{{$negative}}</div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <div class="col-md-12">
                                                                        <p class="box_text_comment">
                                                                            {{$review->comment}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-end">
                                                                    <div class="col-12">
                                                                        <div class="comments_likes">
                                                        <span class="mr-4 mt-1">
                                                            ایا این نظر برایتان مفید بود ؟
                                                        </span>
                                                                     @if(\Illuminate\Support\Facades\Auth::check())
                                                                                <a class="btn btn-like btn-like-like mt-1 mt-md-0 ms-2"
                                                                                   wire:click="votes('like',{{$review->id}})"
                                                                                   href="javascript:void(0)">
                                                                                    <i class="bi bi-hand-thumbs-up"></i>
                                                                                    {{$review->like}}</a>

                                                                                <a class="btn btn-like btn-like-dislike mt-1 mt-md-0"
                                                                                   wire:click="votes('dislike',{{$review->id}})"
                                                                                   href="javascript:void(0)">
                                                                                    <i class="bi bi-hand-thumbs-down"></i>
                                                                                    {{$review->dislike}}</a>
                                                                            @else
                                                                                <a class="btn btn-like btn-like-like mt-1 mt-md-0 ms-2"
                                                                                   href="{{route('client.auth.index')}}">
                                                                                    <i class="bi bi-hand-thumbs-up"></i>
                                                                                    {{$review->like}}</a>

                                                                                <a class="btn btn-like btn-like-dislike mt-1 mt-md-0"
                                                                                   href="{{route('client.auth.index')}}">
                                                                                    <i class="bi bi-hand-thumbs-down"></i>
                                                                                    {{$review->dislike}}</a>
                                                                     @endif

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="container">
                                                <div class="text-center">
                                                    <a class="btn main-color-one-bg border-0"
                                                       wire:click="addToLimitReview" href="javascript:void(0)">بارگذاری
                                                        کامنت ها</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade {{$activeTab == 5 ? 'active' : ''}}" wire:ignore.self
                                             id="productAnswer-pane"
                                             role="tabpanel">
                                            <h4 class="title-font title-line-bottom">پرسش و پاسخ</h4>

                                            <div class="box_questions mt-4">
                                                @if($answer)
                                                    <span class="fw-bold d-block mt-2 text-muted font-12">جواب خود را بنویسید</span>
                                                    <form
                                                        wire:submit="submitAnswerQuestion(Object.fromEntries(new FormData($event.target)))">
                                                        <div class="form-group">
                                                            <label class="d-block">
                                                            <textarea class="form-control" name="textAnswer"
                                                                      wire:model="textAnswer"
                                                                      placeholder="جواب خود را بنویسید..."
                                                                      rows="7"></textarea>
                                                                @error('textAnswer')
                                                                <div wire:loading.remove
                                                                     class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                                                                     role="alert">
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="alert"
                                                                            aria-label="Close">
                                                                        <svg> ...</svg>
                                                                    </button>
                                                                    <strong>خطا!! </strong> {{ $message }}</button>
                                                                </div>
                                                                @enderror
                                                            </label>

                                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                                <button class="btn main-color-three-bg mt-3 btn-lg"
                                                                        type="submit">
                                                                    ثبت جواب
                                                                </button>
                                                            @else
                                                                <a href="{{route('client.auth.index')}}" class="btn main-color-three-bg mt-3 btn-lg"
                                                                        type="submit">
                                                                    ثبت جواب
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </form>
                                                @else
                                                    <span class="fw-bold d-block mt-2 text-muted font-12">پرسش خود را در مورد محصول مطرح</span>
                                                    <form
                                                        wire:submit="submitQuestion(Object.fromEntries(new FormData($event.target)))">
                                                        <div class="form-group">
                                                            <label class="d-block">
                                                            <textarea class="form-control" name="question"
                                                                      wire:model="question"
                                                                      placeholder="هر سوالی در مورد این محصول به ذهنتان میرسید بپرسید!"
                                                                      rows="7"></textarea>
                                                                @error('question')
                                                                <div wire:loading.remove
                                                                     class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                                                                     role="alert">
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="alert"
                                                                            aria-label="Close">
                                                                        <svg> ...</svg>
                                                                    </button>
                                                                    <strong>خطا!! </strong> {{ $message }}</button>
                                                                </div>
                                                                @enderror
                                                            </label>
                                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                                <button class="btn main-color-three-bg mt-3 btn-lg"
                                                                        type="submit">
                                                                    ثبت پرسش
                                                                </button>
                                                            @else
                                                                <a href="{{route('client.auth.index')}}" class="btn main-color-three-bg mt-3 btn-lg"
                                                                        type="submit">
                                                                    ثبت پرسش
                                                                </a>
                                                            @endif

                                                        </div>
                                                    </form>
                                                @endif

                                                <div class="box_filter mt-5 pb-3">
                                                    <div class="row align-items-end">
                                                        <div class="col-md-4 bf1">
                                                            <h4 class="title-font title-line-bottom">پرسش های
                                                                کاربران</h4>
                                                        </div>
                                                        <div class="col-md-8 bf2">
                                                            <ul class="list-inline text-end mb-0">
                                                                <li class="list-inline-item title-font">
                                                                    مرتب سازی بر اساس :
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a class="{{$questionFilterId==1 ? 'active_custom' : ''}}" wire:click="questionFilter(1)" href="javascript:void(0)">
                                                                        بیشترین جواب
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a class="{{$questionFilterId==2 ? 'active_custom' : ''}}" wire:click="questionFilter(2)" href="javascript:void(0)">
                                                                        جدید ترین
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if($productQuestions)
                                                    @foreach($productQuestions as $question)
                                                        <div class="box_questions mt-4">
                                                            <div class="row bs-qu">
                                                                <div class="col-lg-2 bq1 text-center">
                                                                    <i class="bi bi-question-circle-fill"></i>
                                                                    <br>
                                                                    <span class="span1">پرسش</span>
                                                                    <br>
                                                                    <span class="span2">{{$question->user->name}}</span>
                                                                </div>
                                                                <div class="col-lg-10 bq2">
                                                                    <p>{{$question->question}}</p>

                                                                    <div class="row bq-footer">
                                                                        <div class="col-md-5 col-6 my-flex-align-end">
                                                                        <span class="date">
                                                                            {{jalali($question->created_at)->format('Y,m,d')}}
                                                                        </span>
                                                                        </div>
                                                                        <div class="col-md-7 col-6 text-end pe-0">
                                                                            <a class="d-none d-sm-block"
                                                                               href="javascript:void(0)">
                                                                                <span class="main-color-one-color"
                                                                                      wire:click="answerQuestion({{$question->id}})">به این پرسش پاسخ دهید ({{$question->answer->count()}} پاسخ)</span>
                                                                            </a>
                                                                            <a class="d-sm-none d-block"
                                                                               href="javascript:void(0)">پاسخ</a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @foreach($question->answer as $itemAnswer)
                                                                <div class="row bs-qu">
                                                                    <div class="col-lg-2 bq1 text-center">
                                                                        <i class="bi bi-chat-dots-fill"></i>
                                                                        <br>
                                                                        <span class="span1">پاسخ</span>
                                                                        <br>
                                                                        <span
                                                                            class="span2">{{$itemAnswer->user->name}}</span>
                                                                    </div>
                                                                    <div class="col-lg-10 bq2 bg-transparent">
                                                                        <p>
                                                                            {{$itemAnswer->answer}}
                                                                        </p>
                                                                        <div class="row align-items-center bq-footer">
                                                                            <div
                                                                                class="col-lg-5 col-12 my-flex-align-end">
                                                                            <span class="date">{{jalali($itemAnswer->created_at)->format('Y,m,d')}}
                                                                            </span>
                                                                            </div>
                                                                            <div
                                                                                class="col-lg-7 col-12 text-start p-0 ">
                                                                                <div class="comments_likes">
                                                                                <span class="mr-4 mt-1">
                                                                                    ایا این نظر برایتان مفید بود ؟
                                                                                </span>
                                                                                    @if(\Illuminate\Support\Facades\Auth::check())
                                                                                        <a class="btn btn-like btn-like-like mt-1 mt-md-0 ms-2"
                                                                                           wire:click="answerVoites('like',{{$itemAnswer->id}})"
                                                                                           href="javascript:void(0)"><i
                                                                                                class="bi bi-hand-thumbs-up"></i>
                                                                                            {{$itemAnswer->like_votes_count}}

                                                                                        </a>
                                                                                        <a class="btn btn-like btn-like-dislike mt-1 mt-md-0"
                                                                                           wire:click="answerVoites('dislike',{{$itemAnswer->id}})"
                                                                                           href="javascript:void(0)">
                                                                                            <i class="bi bi-hand-thumbs-down"></i>
                                                                                            {{$itemAnswer->dislike_votes_count}}
                                                                                        </a>
                                                                                    @else
                                                                                        <a class="btn btn-like btn-like-like mt-1 mt-md-0 ms-2"

                                                                                           href="{{route('client.auth.index')}}"><i
                                                                                                class="bi bi-hand-thumbs-up"></i>
                                                                                            {{$itemAnswer->like_votes_count}}

                                                                                        </a>
                                                                                        <a class="btn btn-like btn-like-dislike mt-1 mt-md-0"

                                                                                           href="{{route('client.auth.index')}}">
                                                                                            <i class="bi bi-hand-thumbs-down"></i>
                                                                                            {{$itemAnswer->dislike_votes_count}}
                                                                                        </a>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                @endif


                                                <div class="container mt-4">
                                                    <div class="text-center">
                                                        <a class="btn main-color-one-bg border-0" href="javascript:vide(0)" wire:click="addToLimitQuestion">بارگذاری کامنت ها</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 d-xl-block d-none">
                    <div class="position-sticky top-0">
                        <div class="alert border-ui bg-white shadow-box">
                            <div class="text-center my-3 d-flex align-items-center justify-content-center">
                                <strong class="fs-3 fw-900">2,500,000 <span
                                        class="text-muted font-14">تومان</span></strong>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <form class="w-100 d-flex flex-column justify-content-center align-items-center">
                                    <div class="counter">
                                        <label>
                                            <input type="text" name="count" class="counter" value="1">
                                        </label>
                                    </div>
                                    <button
                                        class="btn justify-content-center main-color-two-bg w-100 text-center btn-add-to-cart text-white mt-3">
                                        <i class="bi bi-basket me-3 lh-sm fs-4"></i> افزودن به سبد خرید
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
