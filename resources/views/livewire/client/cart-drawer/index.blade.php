<div>
    <section class="offcanvas offcanvas-end py-2" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel" wire:ignore.self>
        <div class="offcanvas-header shadow-md">
        <a href="{{route('client.cart.index')}}">
            <h5 class="offcanvas-title fw-bold" id="offcanvasCartLabel">سبد خرید <small
                    class="text-muted fw-bold font-14 ms-1">({{$carts->count()}} مورد)</small></h5>
        </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav cart-canvas-parent">
                @foreach($carts as $cart)
                    <li class="nav-item">
                        <div class="cart-canvas">
                            <div class="row align-items-center">
                                <div class="col-4 ps-0">
                                    <img src="/products/{{$cart->product->id}}/small/{{$cart->product->coverImage->path}}" alt="">
                                </div>
                                <div class="col-8">
                                    <h3 class="text-overflow-3 font-16">
                                        {{$cart->product->name}}
                                    </h3>
                                    <div class="product-box-suggest-price my-2  d-flex align-items-center justify-content-between">
                                        <del class="font-16">{{number_format($cart->discountAmount)}}</del>
                                        <ins class="font-25">{{number_format($cart->discountPrice)}}<span>تومان</span></ins>
                                    </div>
                                    <div class="cart-canvas-foot d-flex align-items-center justify-content-between">
                                        <div class="cart-canvas-count">
                                            <span>تعداد:</span>
                                            <span class="fw-bold">{{$cart->quantity}}</span>
                                        </div>
                                        <div class="cart-canvas-delete">
                                            <a href="#" class="btn" wire:click="removeCardItem({{$cart->id}})"><i class="bi bi-x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="cart-canvas-foots bg-white shadow-md">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="cart-canvas-foot-sum">
                            <p class="text-muted mb-2">جمع کل</p>
                            <h5>{{number_format($invoice['totalDiscountPrice'])}} تومان</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="cart-canvas-foot-link text-end">
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <a href="{{route('client.shipping.index')}}" class="btn border-0 main-color-green ">
                                    <i class="bi bi-arrow-left me-1"></i> تکمیل خرید</a>
                            @else
                                <a href="{{route('client.auth.index')}}" class="btn border-0 main-color-green ">
                                    <i class="bi bi-arrow-left me-1"></i> تکمیل خرید</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
