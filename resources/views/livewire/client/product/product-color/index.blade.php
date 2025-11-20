<div class="col-lg-4">
    <div class="alert bs-bg-gray-100 border-ui">
        <div class="text-center my-3 d-flex align-items-center justify-content-center">
            <strong class="fs-3 fw-900">{{number_format($product->price)}} <span class="text-muted font-14">تومان</span></strong>
        </div>
        <br>
        @if($productStock)
            <div class="d-flex align-items-center justify-content-between">
                <form wire:submit="addToCart(Object.fromEntries(new FormData($event.target)))" class="w-100 d-flex flex-column justify-content-center align-items-center">
                    <div class="counter">
                        <label wire:ignore>
                            <input type="text" name="count" class="counter" value="1">
                        </label>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @if(!$inCart)
                            <button
                                class="btn justify-content-center main-color-two-bg w-100 text-center btn-add-to-cart text-white mt-3">
                                <i class="bi bi-basket me-3 lh-sm fs-4"></i> افزودن به سبد خرید
                            </button>
                        @else
                            <a
                                class="btn justify-content-center main-color-two-bg w-100 text-center btn-add-to-cart text-white mt-3">
                                <i class="bi bi-basket me-3 lh-sm fs-4"></i>این محصول اضافه شده
                            </a>
                        @endif
                    @else
                        <a href="{{route('client.auth.index')}}"
                            class="btn justify-content-center main-color-two-bg w-100 text-center btn-add-to-cart text-white mt-3">
                            <i class="bi bi-basket me-3 lh-sm fs-4"></i>این محصول اضافه شده
                        </a>
                    @endif
                </form>
            </div>
        @else
            <div class="d-flex align-items-center justify-content-between">
            <h2>این کالا موجود نیست</h2>
            </div>
        @endif

    </div>
</div>
