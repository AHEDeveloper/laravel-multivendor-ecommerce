<div>
    <section class="content my-xl-3 my-5 py-xl-4 py-5">
        <div class="container-fluid">
            <div class="row gy-3">
                <!-- side nav -->
                <livewire:client.profile.card-profile.index>

                <!-- main content -->
                <div class="col-xl-9">
                    <div class="section-title mb-3">
                        <div class="section-title-title">
                            <h2 class="fw-900 h4">محصولات<span class="with-highlight ms-1">مورد علاقه</span>
                            </h2>
                            <div class="Dottedsquare"></div>
                        </div>
                    </div>
                    <div class="slider-parent content-box rounded-3">
                        <div class="container-fluid">
                            @foreach($favorites as $favorite)
                                <div class="border-bottom end-item-no-border border-1 my-3 py-3">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="card-img">
                                                <a href="">
                                                    <img src="/products/{{$favorite->product->id}}/medium/{{$favorite->product->coverImage->path}}" class="img-thumbnail h-150-px w-150-px object-fit-cover" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <h3 class="mb-3 font-16">
                                                {{$favorite->product->name}}
                                            </h3>
                                            <div class="d-flex align-items-end justify-content-between">
                                                <div class="product-box-suggest-price my-2  d-flex align-items-start flex-column justify-content-start">
                                                    <ins class="font-25 ms-0">{{number_format($favorite->product->price)}} <span>تومان</span></ins>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mt-3 flex-wrap">
                                                <a href="javascript:void(0)" class="btn main-color-three-outline me-2 mb-2" wire:click="remove({{$favorite->id}})"><i class="bi bi-trash me-1"></i></a>
                                                <a href="javascript:void(0)" class="btn main-color-one-outline main-color-one-color mb-2" wire:click="addToCart({{$favorite->product->id}})"><i class="bi bi-cart-plus me-2"></i> افزودن به سبد خرید </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="my-paginate mt-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination flex-wrap justify-content-center">
                                {{ $favorites->links('layouts.admin.pagination') }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
