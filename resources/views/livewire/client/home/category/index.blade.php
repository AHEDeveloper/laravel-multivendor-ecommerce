<div x-intersect="initializeSwipers">
    <section class="card-categories site-slider">
        <div class="container-fluid">
            <div class="row align-items-center gy-4">
                <div class="col-lg-2">
                    <div class="d-lg-flex justify-content-lg-start">
                        <div class="d-flex align-items-center justify-content-lg-center justify-content-between flex-lg-column">
                            <div class="d-lg-block d-flex align-items-center">
                                <h5 class="h3 fw-900">دسته بندی</h5>
                                <h5 class="h3 fw-900 my-lg-2 ms-lg-0 ms-2">محصولات موبایل</h5>
                            </div>
                            <a href="" class="btn btn-sm mt-lg-2 px-xl-5 main-color-one-outline">مشاهده همه <i
                                    class="bi bi-chevron-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div x-intersect="initializeSwipers" class="swiper pro-slider py-4">
                        <div class="swiper-wrapper free-swiper">
                            @foreach($categorys as $category)
                                <div class="swiper-slide">
                                    <a href="{{ route('client.shop.index')}}?categoryId={{$category->id}}">
                                        <div class="cat-item d-flex flex-column align-items-center">
                                            <div class="cat-item-image">
                                                <img src="/categorys/{{$category->id}}/medium/{{@$category->cover->path}}" alt="">
                                            </div>
                                            <div class="cat-item-desc ms-3">
                                                <h6>{{$category->name}}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-nav">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
