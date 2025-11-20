<div>

    <section class="card-categories site-slider">
        <div class="container-fluid">


            <div class="swiper pro-slider py-4" wire:ignore>
                <div class="swiper-wrapper free-swiper" >
                    @foreach($categorys as $category)
                        <div class="swiper-slide" >
                            <a href="javascript:void(0)" wire:click="filterCategory({{ $category->id }})">
                                <div class="cat-item d-flex flex-column align-items-center">
                                    <div class="cat-item-image">
                                        <img src="/categorys/{{ $category->id }}/medium/{{ @$category->cover->path }}" alt="">
                                    </div>
                                    <div class="cat-item-desc ms-3">
                                        <h6>{{ $category->name }}</h6>
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
{{--            <livewire:client.shop.category.index>--}}

                <div class="row gy-4">
                    <!-- filter in mobile -->
                    <livewire:client.shop.filter-mobile.index>
                        <!-- filter in desktop -->
                        <div class="col-lg-3 d-lg-block d-none">
                            <aside class="">

                                <section class="mb-4 border-ui shadow-xl  filter-container">
                                        <h2 class="filter-title">Ram موجود</h2>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" value="16Gig" type="checkbox" id="brand-aeg" wire:click="filterOfRam" wire:model="Ram">
                                            <label class="form-check-label font-16" for="brand-aeg">16 گیگابایت</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" value="32Gig" type="checkbox" id="brand-asus" wire:click="filterOfRam" wire:model="Ram">
                                            <label class="form-check-label font-16" for="brand-asus">32 گیگابایت</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" value="64Gig" type="checkbox" id="brand-panasonic" wire:click="filterOfRam" wire:model="Ram">
                                            <label class="form-check-label font-16" for="brand-panasonic">64 گیگابایت</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" value="128Gig" type="checkbox" id="brand-sony" wire:click="filterOfRam" wire:model="Ram">
                                            <label class="form-check-label font-16" for="brand-sony">128 گیگابایت</label>
                                        </div>
                                    </section>
                                <section class="mb-4 border-ui shadow-xl  filter-container">
                                        <h2 class="filter-title">رنگ گوشی</h2>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" value="Black" type="checkbox" id="brand-aeg" wire:click="filterOfColor" wire:model="color">
                                            <label class="form-check-label font-16" for="brand-aeg">مشکی</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" value="Red" type="checkbox" id="brand-asus" wire:click="filterOfColor" wire:model="color">
                                            <label class="form-check-label font-16" for="brand-asus">قرمز</label>
                                        </div>
                                    </section>
                            </aside>
                        </div>
                        <!-- product -->
                        <div class="col-lg-9">
                            <div class="category-sort mb-3">
                                <div class="content-box">
                                    <div class="container-fluid">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="box_filter d-lg-block d-none">
                                                <ul class="list-inline text-start mb-0">
                                                    <li class="list-inline-item title-font ms-0">مرتب سازی بر اساس :
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <a class="{{$sort == 1 ? 'active_custom' : '' }}" href="javascript:void(0)"
                                                           wire:model="sort" wire:click="sortFilter(1)">گران ترین</a>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <a class="{{$sort == 2 ? 'active_custom' : '' }}" href="javascript:void(0)"
                                                           wire:model="sort" wire:click="sortFilter(2)">ارزان ترین</a>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <a class="{{$sort == 3 ? 'active_custom' : '' }}" href="javascript:void(0)"
                                                           wire:model="sort" wire:click="sortFilter(3)">پروفروش ترین</a>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <a class="{{$sort == 4 ? 'active_custom' : '' }}" href="javascript:void(0)"
                                                           wire:model="sort" wire:click="sortFilter(4)">داغ ترین</a>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <a class="{{$sort == 5 ? 'active_custom' : '' }}" href="javascript:void(0)"
                                                           wire:model="sort" wire:click="sortFilter(5)">محبوب ترین</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="box_filter_counter fs-6"><i class="bi bi-card-list me-2"></i>
                                                {{$products->count()}} کالا
                                            </div>
                                        </div>
                                        <div class="d-lg-none d-block">
                                            <form>
                                                <h5 class="mb-3">مرتب سازی بر اساس</h5>
                                                <select class="form-select">
                                                    <option value="">گران ترین</option>
                                                    <option value="">ارزان ترین</option>
                                                    <option value="">پرفروش ترین</option>
                                                    <option value="">داغ ترین</option>
                                                    <option value="">محبوب ترین</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4">
                                @foreach($products as $product)
                                    <div class="col-lg-4" wire:key="product-{{ $product->id }}">
                                        <div class="product-box border-ui">
                                            <div class="product-timer position-relative">
                                                <div class="product-header-btn flex-column position-absolute top-0">
                                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                                       data-bs-placement="right"
                                                       data-bs-title="مقایسه"><i class="bi bi-shuffle"></i></a>

                                                    <a href="javascript:void(0)" wire:click="favorite({{ $product->id }})" class="mb-1 border-ui">
                                                        @if(!$product->favorite)
                                                            <i class="bi bi-heart"></i>
                                                        @else
                                                            <i class="bi bi-heart" style="color: red"></i>
                                                        @endif
                                                    </a>

                                                    <a href="" class="mb-1 border-ui" data-bs-toggle="tooltip"
                                                       data-bs-placement="right"
                                                       data-bs-title="نمایش سریع"><i class="bi bi-eye"></i></a>
                                                </div>
                                            </div>

                                            <a href="{{ route('client.product.index', $product->p_code) }}/{{ $product->seo->slug }}">
                                                <div class="product-image">
                                                    <img src="/products/{{ $product->id }}/medium/{{ @$product->coverImage->path }}"
                                                         loading="lazy" alt="" class="img-fluid one-image">
                                                    <img src="/products/{{ $product->id }}/medium/{{ @$product->coverImageNull->path }}"
                                                         loading="lazy" alt="" class="img-fluid two-image">
                                                </div>
                                                <div class="d-flex h-80-px align-items-center justify-content-between">
                                                    <h6 class="font-14 text-overflow-2 my-3 lh-lg">{{ $product->name }}</h6>
                                                </div>
                                            </a>

                                            <div class="product-action bs-bg-gray-200 border-ui rounded-3">
                                                @if(\Illuminate\Support\Facades\Auth::check())
                                                    <div class="discount mt-1" wire:click="addToCart({{ $product->id }})">
                                                        <span class="btn main-color-one-bg"><i class="bi bi-cart"></i></span>
                                                        <div class="countdown mt-1" data-date="2028-01-01" data-time="18:30"></div>
                                                    </div>
                                                @else
                                                    <a href="{{ route('client.auth.index') }}">
                                                        <div class="discount mt-1">
                                                            <span class="btn main-color-one-bg"><i class="bi bi-cart"></i></span>
                                                        </div>
                                                    </a>
                                                @endif

                                                <div class="price d-flex justify-content-end flex-column align-content-end">
                                                    <p class="new-price me-0 text-end">
                                                        {{ number_format($product->finalPrice) }} <span class="fw-normal">تومان</span>
                                                    </p>
                                                    <p class="old-price">
                                                        <span class="badge bg-danger rounded-pill me-2">{{ $product->discount }}%</span>
                                                        {{ number_format($product->price) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="my-paginate mt-5">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination flex-wrap justify-content-center">
                                        {{ $products->links('layouts.admin.pagination') }}
                                    </ul>

                                </nav>
                            </div>

                        </div>

                </div>
        </div>
    </section>
    <script src="/client/assets/plugin/nouislider/nouislider.min.js"></script>
</div>
