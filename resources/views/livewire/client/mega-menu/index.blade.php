<div class="mega-menu menu pb-3 d-lg-block d-none mega-menu-top">
    <div class="container-fluid">
        <div class="row position-relative">
            <!-- mega menu -->
            <div class="col-xl-6 header-mega-pos z-3 order-xl-4 d-xl-block d-none col-4">
                <div class="d-flex align-items-center justify-content-start">
                    <div class="top-menu-menu">
                        <ul class="navbar-nav align-items-center">
                            <li class="position-relative m-0"></li>
                            <li class="nav-item main-menu-head">
                                <a class="btn text-white btn-xl rounded-4 font-16 main-color-one-bg" href="">
                                    <i class="bi bi-grid"></i>
                                    مگا تب منو
                                </a>
                                <ul class="main-menu mega-container">
                                  @foreach($megaCategory as $category)
                                        <li class="">
                                            <a  href="javascript:void(0)">
                                                <i class="bi bi-phone"></i>
                                                {{$category->name}}</a>
                                            <ul class="main-menu-sub back-menu" style=" background: #fff url('/client/assets/image/mobiles.png') no-repeat;">
                                                @foreach($category->megaFeature as $feature)
                                                    <li><a class="title my-flex-baseline">{{$feature->name}}</a></li>
                                                    @foreach($feature->megaValue as $value)
                                                        <li><a href="{{route('client.shop.index')}}?filter={{$value->value}}">{{$value->name}}</a></li>
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </li>
                                  @endforeach
                                </ul>
                            </li>
                    </div>

                </div>

            </div>

            <!-- search and cart-->
            <div class="col-xl-6 header-search-pos d-xl-block d-none z-3 order-xl-5 col-4">
                <div class="d-flex justify-content-end align-items-center">
                    <div class="text-end d-xl-flex w-50 d-none">
                        <label class="d-block w-100 position-relative flex-grow-1">
                            <input type="text" wire:model.live.debounce.300ms="search" class="form-control py-3 rounded-4 w-100 bg-white"
                                   placeholder="جستجوی محصول ...">
                            <span class="position-absolute me-3 end-0 top-50 translate-middle-y">
                                <a href="{{route('client.shop.index')}}?q={{$search}}">
                                    <i class="bi bi-search"></i>
                                </a>
                            </span>
                        </label>
                    </div>
                    <div class="text-end  add-to-cart-btn-parent">
                        <a data-bs-toggle="offcanvas" href="#offcanvasCart" role="button" aria-controls="offcanvasCart"
                           class="btn btn-xl ms-3 rounded-4 font-16 bg-white border-1 focus-ring focus-ring-dark border-dark-subtle z-3">
                            <i class="bi bi-cart"></i>
                            <span class="ms-2 add-to-cart-btn-text fw-4">سبد خرید</span>
                            <span class="badge main-color-one-bg rounded-circle ms-2">{{$cart}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
