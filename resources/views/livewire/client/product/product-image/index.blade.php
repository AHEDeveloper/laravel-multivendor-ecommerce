<div class="col-lg-4">

    <div class="pro_gallery">
        <div class="position-relative">
            <div class="swiper product-gallery" wire:ignore>
                <div class="swiper-wrapper" title="برای بزرگنمایی تصویر دابل کلیک کنید">
                    @foreach($images as $image)
                        <div class="swiper-slide">
                            <div class="swiper-zoom-container">
                                <img class="img-fluid" src="/products/{{$productId}}/large/{{$image->path}}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next d-none d-lg-flex"></div>
                <div class="swiper-button-prev d-none d-lg-flex"></div>
            </div>
            <div class="icon-product-box">
                @if($product->video)
                    <div class="icon-product-box-item hint--right showStoryBtn" data-bs-toggle="modal"
                         data-bs-target="#storyModal" data-story="/stories/products/{{$product->video->path}}">
                        <i class="bi bi-play-circle"></i>
                    </div>
                @else
                    <div class="icon-product-box-item hint--right showStoryBtn" data-bs-toggle="modal"
                         data-bs-target="#storyModal" data-story="">
                        <i class="bi bi-play-circle"></i>
                    </div>
                @endif
                <div class="icon-product-box-item hint--right" data-bs-toggle="modal"
                     data-bs-target="#shareModal" data-hint="اشتراک گذاری">
                    <i class="bi bi-share-fill"></i>
                </div>
                <div class="icon-product-box-item hint--right" wire:click="favorite" data-hint="افزودن به محصولات مورد علاقه">
                    @if($product->favorite)
                        <i class="bi bi-heart" style="color: red"></i>
                    @else
                        <i class="bi bi-heart"></i>
                    @endif
                </div>

                <div class="icon-product-box-item hint--right" data-hint="نمودار قیمت"
                     data-bs-toggle="modal" data-bs-target="#chartModal">
                    <i class="bi bi-bar-chart"></i>
                </div>
            </div>
        </div>
        <div class="swiper product-gallery-thumb" wire:ignore>
            <div class="swiper-wrapper" >
                @foreach($images as $image)
                    <div class="swiper-slide" >
                        <div class="swiper-zoom-container" >
                            <img class="img-fluid" src="/products/{{$productId}}/large/{{$image->path}}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Modal Show Story-->
    <div class="modal fade" id="storyModal"  tabindex="-1" role="dialog" aria-labelledby="storyModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="storyModalLabel">ویدیو محصول</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" >
                    <video controls class="img-fluid" style="height: 70vh;width: 100%" id="videoStory" preload="none" wire:ignore.self>

                    </video>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> بستن</button>
                </div>
            </div>
        </div>
    </div>
@push('jsVideo')
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
@endpush
</div>
