<div>
    <section class="content mt-xl-0 mt-5 pt-5">
        <div class="container-fluid">
            <!-- blog title -->
            <div class="blog-header mt-xl-0 mt-3">
                <div class="row gy-3">
                    <div class="col-md-8">
                        <div class="blog-header-title slider-title-desc">
                            <div class="section-title">
                                <div class="section-title-title">
                                    <h2 class="fw-900 h4">وبلاگ<span class="with-highlight ms-1">آبتین</span>
                                    </h2>
                                    <div class="Dottedsquare"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- blog post -->
            <div class="row gy-4 mt-4">
                <div class="col-lg-9">
                    <div class="blog-title">
                        <div class="content-box">
                            <div class="container-fluid">
                                <div class="blog-title-title">
                                    <h2>{{$blog->name}}</h2>
                                </div>
                                <div class="blog-content-meta-detail">
                                    <div class="row gy-4 justify-content-center">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="blog-content-meta-detail-item">
                                                <i class="bi bi-stack"></i>
                                                <h6>دسته بندی: </h6>
                                                <a href="" class="badge bg-danger font-14">{{$blog->category}}</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="blog-content-meta-detail-item">
                                                <i class="bi bi-clock"></i>
                                                <h6>زمان مطالعه: </h6>
                                                <span>{{$blog->StudyTime}}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="blog-content-meta-detail-item">
                                                <i class="bi bi-calendar-check"></i>
                                                <h6>آخرین بروزرسانی: </h6>
                                                <span>
                                                         {{jalali($blog->updated_at)->format('Y,m,d')}}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="blog-content-meta-detail-item">
                                                <i class="bi bi-send"></i>
                                                <h6>نظرات: </h6>
                                                <a href="">17 نظر</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-content mt-3">
                        <div class="content-box">
                            <div class="container-fluid">
                                <div class="blog-single-content">
                                    <div class="text-center mb-4">
                                        <img src="/blog/{{$blog->id}}/large/{{$blog->cover->path}}" class="img-thumbnail" alt="">
                                    </div>
                                    <div class="product-desc-content">
                                        <input class="read-more-state" id="readMore2" type="checkbox">
                                        <!-- والد بیشتر ، کمتر ، تمام متن توضیحات باید داخل این تگ قرار بگیرند -->
                                        <div class="read-more-wrap">
                                            <h6 class="font-26 mb-2 title-font ">
                                                {!! $blog->description !!}
                                            </h6>
                                            <p>
                                                </p>
                                            <!-- متن بیشتر -->
                                            <div class="read-more-target">

                                            </div>
                                            <!-- پایان متن بیشتر -->
                                        </div>
                                        <!-- پایان والد بیشتر کمتر -->
{{--                                        <label class="read-more-trigger" for="readMore2"></label>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="position-sticky top-0">
                        <div class="blog-side-author mb-4 blog-side text-center bg-white shadow-box p-3 rounded-3">
                            <div class="blog-side-author-img">
                                <img src="/client/assets/image/user/user.jpg"
                                     class="rounded-circle border-4 border-primary p-2 border" alt="">
                            </div>
                            <div class="blog-side-author-name my-3"><h5>امیر رضایی</h5></div>
                            <div class="blog-side-created-at pb-4 border-bottom"><p
                                    class="badge bg-secondary-subtle text-dark font-18">
                                    {{ jalali($blog->created_at)->format('d, %B, Y') }}

                                </p></div>
                            <div class="blog-side-share mt-3">
                                <p class="text-muted">
                                    اشتراک گذاری در شبکه های اجتماعی
                                </p>
                                <nav class="navbar navbar-expand justify-content-center">
                                    <ul class="navbar-nav">
                                        <li class="nav-item"><a href="" class="nav-link text-muted-two"><i
                                                    class="bi bi-instagram"></i></a></li>
                                        <li class="nav-item"><a href="" class="nav-link text-muted-two"><i
                                                    class="bi bi-twitter"></i></a></li>
                                        <li class="nav-item"><a href="" class="nav-link text-muted-two"><i
                                                    class="bi bi-linkedin"></i></a></li>
                                        <li class="nav-item"><a href="" class="nav-link text-muted-two"><i
                                                    class="bi bi-telegram"></i></a></li>
                                        <li class="nav-item"><a href="" class="nav-link text-muted-two"><i
                                                    class="bi bi-whatsapp"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="card blog-card mb-4 shadow-box mb-4">
                            <div class="card-header bg-transparent border-0">
                                <h5 class="title-line-bottom">آخرین مطالب</h5>
                            </div>
                            <div class="card-body pb-0">

                                <nav class="navbar">
                                    <ul class="navbar-nav">
                                       @foreach($weblogLatest as $weblog)
                                            <li class="nav-item">
                                                <a href="{{route('client.weblog.single',$weblog->id)}}" class="nav-link">
                                                    <div class="mini-blog-item">
                                                        <div class="image">
                                                            <img src="/blog/{{$weblog->id}}/small/{{$weblog->cover->path}}" class="img-thumbnail"
                                                                 alt="">
                                                        </div>
                                                        <div class="d-flex align-items-start desc flex-wrap flex-column justify-content-between">
                                                            <h6 class="title mct-hover">{{$weblog->name}}</h6>
                                                            <div class="d-flex align-items-center">
                                                                <p class="text-muted mb-0">
                                                                    {{ jalali($weblog->created_at)->format('d, %B, Y') }}

                                                                </p>
                                                                <div class="text-end ms-2"><i
                                                                        class="bi bi-arrow-left main-color-one-color"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </a>
                                            </li>
                                       @endforeach
                                    </ul>
                                </nav>

                            </div>
                        </div>
                        <div class="card blog-card shadow-box d-lg-block d-none">
                            <div class="card-header bg-transparent border-0">
                                <h5 class="title-line-bottom">تبلیغات</h5>
                            </div>
                            <div class="card-body p-3">
                                <div class="blog-card-items">
                                    <img src="/client/assets/image/blog/bonrailco-1.gif" class="w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

