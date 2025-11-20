<div class="col-xl-9">

    <div class="content-box">
        <div class="row">
            <div class="col-10">
                <h2 class="h5">
                    سبد خرید شما
                    <small class="text-muted mt-3 d-inline-block font-16 ms-2">({{$cartItems->count()}} کالا)</small>
                </h2>
            </div>
            <div class="col-2">
                <div class="dropdown dropstart text-end">
                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu flex-column">
                        <li><a class="dropdown-item fs-6" wire:click="removeCarts" href="#">حذف همه</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @if($cartItems)
            @foreach($cartItems as $cart)
                <div class="border-bottom end-item-no-border border-1 my-3 py-3">
                    <div class="row">
                        <div class="col-xl-2">
                            <div class="card-img">
                                <img src="/products/{{$cart->product->id}}/medium/{{$cart->product->coverImage->path}}"
                                     class="img-thumbnail h-150-px w-150-px object-fit-cover" alt="">
                            </div>
                            <form class="w-100 d-flex justify-content-start mt-3 align-items-center">
                                <div class="counter">
                                    <label>
                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                        <span class="input-group-btn input-group-prepend">
                                            <button
                                                class="btn-counter waves-effect waves-light bootstrap-touchspin-down"
                                                wire:click="updateCartQuantity({{$cart->id}},'decrement')"
                                                type="button">-</button>
                                        </span>
                                            <input type="text" name="count" class="counter form-counter"
                                                   value="{{$cart->quantity}}">
                                            <span class="input-group-btn input-group-append">
                                            <button class="btn-counter waves-effect waves-light bootstrap-touchspin-up"
                                                    wire:click="updateCartQuantity({{$cart->id}},'increment')"
                                                    type="button">+</button>
                                        </span>
                                        </div>
                                    </label>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-10">
                            <h3 class="mb-3 font-16">
                                {{$cart->product->name}}
                            </h3>
                            <div class="cart-item-feature d-flex flex-column align-items-start flex-wrap">
                                <div class="item d-flex align-items-center">
                                    <div class="icon"><i class="bi bi-shop"></i></div>
                                    <div class="seller-name mx-2">فروشنده:</div>
{{--                                    <div class="seller-name text-muted">{{$cart->product->seller->shop_name}}</div>--}}
                                </div>
                                <div class="item d-flex align-items-center mt-2">
                                    <div class="icon"><i class="bi bi-shield-check"></i>
                                    </div>
                                    <div class="seller-name mx-2">گارانتی:</div>
                                    <div class="seller-name text-muted">گرین</div>
                                </div>
                                <div class="item d-flex align-items-center mt-2">
                                    <div class="icon"><i class="bi bi-shop-window"></i>
                                    </div>
                                    <div class="seller-name mx-2">موجودی:</div>
                                    <div class="seller-name text-muted">
                                        @if($cart->product->stock != 0)
                                            <span> موجود در انبار</span>
                                        @else
                                            <span style="color: red"> موجود در انبار نیست!!</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between">
                                <div
                                    class="product-box-suggest-price my-2  d-flex align-items-start flex-column justify-content-start">
                                    <del class="font-16 my-2">{{number_format($cart->discountAmount)}}</del>
                                    <ins class="font-25 ms-0">{{number_format($cart->discountPrice)}}<span>تومان</span>
                                    </ins>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</div>
