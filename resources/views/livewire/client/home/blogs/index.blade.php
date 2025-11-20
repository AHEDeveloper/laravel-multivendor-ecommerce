<div x-intersect="initializeBlogSlider">
    <section class="blog-slider">
        <div class="container-fluid">
            <div class="section-title mb-3">
                <div class="row gy-3 align-items-center">
                    <div class="col-sm-8">
                        <div class="section-title-title">
                            <h2 class="fw-900 h4">آخرین مطالب<span class="with-highlight ms-1">وبلاگ</span>
                            </h2>
                            <div class="Dottedsquare"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="section-title-link text-sm-end text-start">
                            <a class="btn main-color-one-bg border-0" href=""> مشاهده همه</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper mt-5 blog-slider-sw">
                <div class="swiper-wrapper">
                    @foreach($blogs as $blog)
                        <div class="swiper-slide">
                            <div class="card blog-card border-0 position-relative">
                                <div class="card-img">
                                    <img src="/blog/{{$blog->id}}/large/{{$blog->cover->path}}"
                                         class="img-fluid rounded-5"
                                         alt="">
                                </div>
                                <div
                                    class="card-body blog-card-text bg-white rounded-3 shadow-box mt-3 border-ui">
                                    <h6 class="text-overflow-1 h5">
                                        {{$blog->name}}
                                    </h6>
                                    <div class="d-flex mt-3 align-items-center justify-content-between">
                                        <div>
                                            <i class="bi bi-calendar4-week"></i>
                                            <span class="ms-2">{{ jalali($blog->created_at)->format('d, %B, Y') }}</span>
                                        </div>
                                        <a href="#" class="btn btn-sm main-color-one-bg">مشاهده <i
                                                class="bi bi-arrow-left-short"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
</div>
