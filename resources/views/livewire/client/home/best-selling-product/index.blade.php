<div x-intersect="initializeProSliderWithCover">
    <section class="product-slider">
        <div class="container-fluid">
            <div class="section-title mb-3">
                <div class="row gy-3 align-items-center">
                    <div class="col-sm-8">
                        <div class="section-title-title">
                            <h2 class="fw-900 h4">گوشی براساس<span class="with-highlight ms-1">ویژگی</span>
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
            <div class="row gy-3 mt-4">
                <div class="col-md-3">
                    <a href="">
                        <div class="banner-image-parent">
                            <div class="banner-image-main">
                                <img class="rounded-4" src="client/assets/image/product/product_cover_1.png"
                                     alt="">
                            </div>
                            <div class="banner-image-blur">
                                <img src="client/assets/image/product/product_cover_1.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-9">
                    <div x-intersect="initializeProSliderWithCover" class="swiper pro-slider-with-cover">
                        <div class="swiper-wrapper">
{{--                            @dd($bestProducts)--}}
                            @foreach($bestProducts as $product)
                                <div class="swiper-slide">
                                    <div class="product-box border-ui">
                                        <div class="product-timer position-relative">
                                            <div class="product-header-btn flex-column position-absolute top-0">
                                                <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                                   data-bs-placement="right"
                                                   data-bs-title="مقایسه"><i class="bi bi-shuffle"></i></a>
                                                <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                                   data-bs-placement="right"
                                                   data-bs-title="افزودن به علاقه مندی ها"><i
                                                        class="bi bi-heart"></i></a>
                                                <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                                   data-bs-placement="right"
                                                   data-bs-title="نمایش سریع"><i class="bi bi-eye"></i></a>
                                            </div>
                                        </div>
                                        <a href="{{route('client.product.index',$product->p_code)}}/{{$product->seo->slug}}">
                                            <div class="product-image">
                                                <img src="/products/{{$product->id}}/medium/{{$product->coverImage->path}}"
                                                     loading="lazy" alt=""
                                                     class="img-fluid one-image">
                                                <img src="/products/{{$product->id}}/medium/{{$product->coverImageNull->path}}"
                                                     loading="lazy" alt=""
                                                     class="img-fluid two-image">
                                            </div>
                                            <div
                                                class="d-flex h-80-px align-items-center justify-content-between ">
                                                <h6 class="font-14 text-overflow-2 my-3 lh-lg">{{$product->name}}</h6>
                                            </div>
                                        </a>

                                            <div class="product-action bs-bg-gray-200 border-ui  rounded-3">
                                                @if(\Illuminate\Support\Facades\Auth::check())
                                                    <div class="discount mt-1" wire:click="addToCart({{$product->id}})">
                                                            <span class="btn main-color-one-bg"><i
                                                                    class="bi bi-cart"></i></span>
                                                        <div class='countdown mt-1' data-date="2028-01-01"
                                                             data-time="18:30">
                                                        </div>
                                                    </div>
                                                @else
                                                    <a href="{{route('client.auth.index')}}">
                                                        <div class="discount mt-1">
                                                            <span class="btn main-color-one-bg"><i
                                                                    class="bi bi-cart"></i></span>
                                                            <div class='countdown mt-1' data-date="2028-01-01"
                                                                 data-time="18:30">
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endif
                                                <div
                                                    class="price d-flex justify-content-end flex-column align-content-end">
                                                    <p class="new-price me-0 text-end">{{number_format($product->price)}}<span
                                                            class="fw-normal">تومان</span></p>
                                                    <p class="old-price">
                                                                <span
                                                                    class="badge bg-danger rounded-pill me-2">{{$product->discount}}%</span>
                                                        {{number_format($product->finalPrice)}}
                                                    </p>
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
            </div>
        </div>
    </section>

</div>
