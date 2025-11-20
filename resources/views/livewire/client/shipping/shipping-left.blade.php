<div class="col-lg-3">
    <div class="card p-3 mb-3 d-">
        <label class="fw-bold form-label">کد تخفیف</label>
        <form wire:submit="codeSubmit(Object.fromEntries(new FormData($event.target)))">
            <div class="input-group mt-2">
                <input type="text" class="form-control form-control-lg" name="code" placeholder="اینجا بنویسید">
                <button type="submit" class="btn btn-lg font-14 fw-bold border no-highlight">ثبت</button>
            </div>
            @error('code')
            <span style="color: red">
                    {{$message}}
                </span>
            @enderror
        </form>
        @if(session()->has('error'))
            <span style="color: red">
                    {{ session('error') }}
                </span>
        @endif
        @if(session()->has('success'))
            <span style="color: green">
                    {{ session('success') }}
                </span>
        @endif

    </div>
    <div class="cart-canvases position-sticky top-0">

        <div class="item">

            <div class="factor">
                <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0 h6">قیمت کالا ها({{$totalProductCount}} کالا)</h5>
                    <p class="mb-0 font-17">{{number_format($totalOriginalPrice)}} تومان</p>
                </div>

                <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0 h6">هزینه ارسال</h5>
                    <p class="mb-0 font-18">{{number_format($deliveryPrice)}} تومان</p>
                </div>

             @if($showDiscountCode)
                    <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                        <h5 class="fw-bold mb-0 h6 main-color-green-color">تخفیف اعمال شده</h5>
                        <p class="mb-0 font-18 main-color-green-color">{{number_format($discountCodeAmount)}} تومان</p>
                    </div>
             @endif

                <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0 h6">مجموع</h5>
                    <p class="mb-0 font-18">{{number_format($totalAmount)}} تومان</p>
                </div>

                <div class="action mt-3 d-flex align-items-center justify-content-center">
                    <a href="#" wire:click="submitOrder"
                       class="btn main-color-two-bg text-white py-2 rounded-3 rounded-3 d-block w-100">پرداخت</a>
                </div>
            </div>
        </div>
    </div>
</div>
