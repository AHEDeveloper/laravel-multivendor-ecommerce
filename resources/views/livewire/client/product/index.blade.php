<div>
    @push('linkProduct')
        <link rel="stylesheet" href="/client/assets/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css">
        <link href="/client/assets/plugin/tagify/tagify.css" rel="stylesheet">
    @endpush
    <section class="content">
        <div class="bread-crumb py-0 mb-3">
            <div class="container-fluid">
                <div class="content-box">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('client.home.index')}}" class="font-14 text-muted">خانه</a></li>
                                <li class="breadcrumb-item"><a href="{{route('client.shop.index')}}" class="font-14 text-muted">فروشگاه</a></li>
                                <li class="breadcrumb-item active main-color-one-color font-14" aria-current="page">گوشی شیائومی</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="content-box">
                <div class="row gy-4">
                    <livewire:client.product.product-image.index :productId="$product->id" :product="$product" :coverImage="$product->coverImage" :images="$product->images">
                        <livewire:client.product.product-feature.index :productId="$product->id" :name="$product->name">
                            <livewire:client.product.product-color.index :productId="$product->id" :productStock="$product->stock" :product="$product">
                </div>
            </div>
        </div>
    </section>

        <livewire:client.product.product-seller.index>

        <livewire:client.product.product-tab.index :productId="$product->id">

    <section class="product-slider">
        <div class="container-fluid">
            <div class="section-title">
                <div class="section-title-title">
                    <h2 class="fw-900 h4">محصولات<span class="with-highlight ms-1">پیشنهادی</span></h2>
                    <div class="Dottedsquare"></div>
                </div>
            </div>
            <div class="swiper mt-4 pro-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="product-box border-ui">
                            <div class="product-timer position-relative">
                                <div class="product-header-btn flex-column position-absolute top-0">
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="مقایسه"><i class="bi bi-shuffle"></i></a>
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="افزودن به علاقه مندی ها"><i class="bi bi-heart"></i></a>
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="نمایش سریع"><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <a href="">
                                <div class="product-image">
                                    <img src="/client/assets/image/product/television3.jpg" loading="lazy" alt=""
                                         class="img-fluid one-image">
                                    <img src="/client/assets/image/product/television4.jpg" loading="lazy" alt=""
                                         class="img-fluid two-image">
                                </div>
                                <div class="d-flex h-80-px align-items-center justify-content-between ">
                                    <h6 class="font-14 text-overflow-2 my-3 lh-lg">گوشی موبایل ناتینگ مدل Phone 2a
                                        دو سیم کارت ظرفیت 256 گیگابایت رم 12 گیگابایت</h6>
                                </div>
                                <div class="product-action bs-bg-gray-200 border-ui  rounded-3">
                                    <div class="discount mt-1">
                                        <span class="btn main-color-one-bg"><i class="bi bi-cart"></i></span>
                                    </div>
                                    <div class="price d-flex justify-content-end flex-column align-content-end">
                                        <p class="new-price me-0 text-end">3,175,000 <span
                                                class="fw-normal">تومان</span></p>
                                        <p class="old-price">
                                            <span class="badge bg-danger rounded-pill me-2">25%</span>
                                            6,500,000
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box border-ui">
                            <div class="product-timer position-relative">
                                <div class="product-header-btn flex-column position-absolute top-0">
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="مقایسه"><i class="bi bi-shuffle"></i></a>
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="افزودن به علاقه مندی ها"><i class="bi bi-heart"></i></a>
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="نمایش سریع"><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <a href="">
                                <div class="product-image">
                                    <img src="/client/assets/image/product/television1.jpg" loading="lazy" alt=""
                                         class="img-fluid one-image">
                                    <img src="/client/assets/image/product/television2.jpg" loading="lazy" alt=""
                                         class="img-fluid two-image">
                                </div>
                                <div class="d-flex h-80-px align-items-center justify-content-between ">
                                    <h6 class="font-14 text-overflow-2 my-3 lh-lg">گوشی موبایل ناتینگ مدل Phone 2a
                                        دو سیم کارت ظرفیت 256 گیگابایت رم 12 گیگابایت</h6>
                                </div>
                                <div class="product-action bs-bg-gray-200 border-ui  rounded-3">
                                    <div class="discount mt-1">
                                        <span class="btn main-color-one-bg"><i class="bi bi-cart"></i></span>
                                    </div>
                                    <div class="price d-flex justify-content-end flex-column align-content-end">
                                        <p class="new-price me-0 text-end">3,175,000 <span
                                                class="fw-normal">تومان</span></p>
                                        <p class="old-price">
                                            <span class="badge bg-danger rounded-pill me-2">25%</span>
                                            6,500,000
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box border-ui">
                            <div class="product-timer position-relative">
                                <div class="product-header-btn flex-column position-absolute top-0">
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="مقایسه"><i class="bi bi-shuffle"></i></a>
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="افزودن به علاقه مندی ها"><i class="bi bi-heart"></i></a>
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="نمایش سریع"><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <a href="">
                                <div class="product-image">
                                    <img src="/client/assets/image/product/watch1.jpg" loading="lazy" alt=""
                                         class="img-fluid one-image">
                                    <img src="/client/assets/image/product/watch2.jpg" loading="lazy" alt=""
                                         class="img-fluid two-image">
                                </div>
                                <div class="d-flex h-80-px align-items-center justify-content-between ">
                                    <h6 class="font-14 text-overflow-2 my-3 lh-lg">گوشی موبایل ناتینگ مدل Phone 2a
                                        دو سیم کارت ظرفیت 256 گیگابایت رم 12 گیگابایت</h6>
                                </div>
                                <div class="product-action bs-bg-gray-200 border-ui  rounded-3">
                                    <div class="discount mt-1">
                                        <span class="btn main-color-one-bg"><i class="bi bi-cart"></i></span>
                                    </div>
                                    <div class="price d-flex justify-content-end flex-column align-content-end">
                                        <p class="new-price me-0 text-end">3,175,000 <span
                                                class="fw-normal">تومان</span></p>
                                        <p class="old-price">
                                            <span class="badge bg-danger rounded-pill me-2">25%</span>
                                            6,500,000
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box border-ui">
                            <div class="product-timer position-relative">
                                <div class="product-header-btn flex-column position-absolute top-0">
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="مقایسه"><i class="bi bi-shuffle"></i></a>
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="افزودن به علاقه مندی ها"><i class="bi bi-heart"></i></a>
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="نمایش سریع"><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <a href="">
                                <div class="product-image">
                                    <img src="/client/assets/image/product/watch3.jpg" loading="lazy" alt=""
                                         class="img-fluid one-image">
                                    <img src="/client/assets/image/product/watch4.jpg" loading="lazy" alt=""
                                         class="img-fluid two-image">
                                </div>
                                <div class="d-flex h-80-px align-items-center justify-content-between ">
                                    <h6 class="font-14 text-overflow-2 my-3 lh-lg">گوشی موبایل ناتینگ مدل Phone 2a
                                        دو سیم کارت ظرفیت 256 گیگابایت رم 12 گیگابایت</h6>
                                </div>
                                <div class="product-action bs-bg-gray-200 border-ui  rounded-3">
                                    <div class="discount mt-1">
                                        <span class="btn main-color-one-bg"><i class="bi bi-cart"></i></span>
                                    </div>
                                    <div class="price d-flex justify-content-end flex-column align-content-end">
                                        <p class="new-price me-0 text-end">3,175,000 <span
                                                class="fw-normal">تومان</span></p>
                                        <p class="old-price">
                                            <span class="badge bg-danger rounded-pill me-2">25%</span>
                                            6,500,000
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>ّ
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box border-ui">
                            <div class="product-timer position-relative">
                                <div class="product-header-btn flex-column position-absolute top-0">
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="مقایسه"><i class="bi bi-shuffle"></i></a>
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="افزودن به علاقه مندی ها"><i class="bi bi-heart"></i></a>
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="نمایش سریع"><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <a href="">
                                <div class="product-image">
                                    <img src="/client/assets/image/product/product-image1.jpg" loading="lazy" alt=""
                                         class="img-fluid one-image">
                                    <img src="/client/assets/image/product/product-image2.jpg" loading="lazy" alt=""
                                         class="img-fluid two-image">
                                </div>
                                <div class="d-flex h-80-px align-items-center justify-content-between ">
                                    <h6 class="font-14 text-overflow-2 my-3 lh-lg">گوشی موبایل ناتینگ مدل Phone 2a
                                        دو سیم کارت ظرفیت 256 گیگابایت رم 12 گیگابایت</h6>
                                </div>
                                <div class="product-action bs-bg-gray-200 border-ui  rounded-3">
                                    <div class="discount mt-1">
                                        <span class="btn main-color-one-bg"><i class="bi bi-cart"></i></span>
                                    </div>
                                    <div class="price d-flex justify-content-end flex-column align-content-end">
                                        <p class="new-price me-0 text-end">3,175,000 <span
                                                class="fw-normal">تومان</span></p>
                                        <p class="old-price">
                                            <span class="badge bg-danger rounded-pill me-2">25%</span>
                                            6,500,000
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box border-ui">
                            <div class="product-timer position-relative">
                                <div class="product-header-btn flex-column position-absolute top-0">
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="مقایسه"><i class="bi bi-shuffle"></i></a>
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="افزودن به علاقه مندی ها"><i class="bi bi-heart"></i></a>
                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="نمایش سریع"><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <a href="">
                                <div class="product-image">
                                    <img src="/client/assets/image/product/product-image3.jpg" loading="lazy" alt=""
                                         class="img-fluid one-image">
                                    <img src="/client/assets/image/product/product-image4.jpg" loading="lazy" alt=""
                                         class="img-fluid two-image">
                                </div>
                                <div class="d-flex h-80-px align-items-center justify-content-between ">
                                    <h6 class="font-14 text-overflow-2 my-3 lh-lg">گوشی موبایل ناتینگ مدل Phone 2a
                                        دو سیم کارت ظرفیت 256 گیگابایت رم 12 گیگابایت</h6>
                                </div>
                                <div class="product-action bs-bg-gray-200 border-ui  rounded-3">
                                    <div class="discount mt-1">
                                        <span class="btn main-color-one-bg"><i class="bi bi-cart"></i></span>
                                    </div>
                                    <div class="price d-flex justify-content-end flex-column align-content-end">
                                        <p class="new-price me-0 text-end">3,175,000 <span
                                                class="fw-normal">تومان</span></p>
                                        <p class="old-price">
                                            <span class="badge bg-danger rounded-pill me-2">25%</span>
                                            6,500,000
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    @push('jsProduct')
        <script src="/client/assets/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

        <script src="/client/assets/plugin/chartjs/chart.js"></script>

        <!-- initial chart -->
        <script>
            const ctx = document.getElementById('myChart');
            Chart.defaults.font.family = "payda";
            Chart.defaults.font.size = 16;


            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['23 مهر 1401', '11 آبان 1401', '4 آذر 1401', '11 دی 1401', '5 بهمن 1401',
                        '19 اسفند 1401'
                    ],
                    datasets: [{
                        label: 'iphone 12 promax 256',
                        data: [1500000, 1700000, 1900000, 1400000, 1600000, 3200000],
                        borderWidth: 4,
                        borderColor: '#007fee',
                        pointBackgroundColor: '#fff',
                        pointRadius: 10,
                        pointHoverRadius: 15,
                        tension: 0.1,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: false,
                            text: () => 'نمودار فروش محصول: ' + 'ایفون 12 pro max',
                        },
                    }
                }
            });
        </script>

        <!-- initial tag for comment section -->


        <!-- initial counter product for product add to cart section -->
        <script>
            $(document).ready(function () {
                $("input[name='count']").TouchSpin({
                    min: 1,
                    max: '1000000000000000',
                    buttondown_class: "btn-counter waves-effect waves-light",
                    buttonup_class: "btn-counter waves-effect waves-light"
                });
            });
        </script>
    @endpush
</div>
