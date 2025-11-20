<div class="col-xl-3">
    <div class="cart-canvases position-sticky top-0">
        <div class="item">
            <div class="factor">
                <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0 h6">قیمت کالا ها({{number_format($invoice['totalProductCount'])}} کالا)</h5>
                    <p class="mb-0 font-17">{{number_format($invoice['totalOriginalPrice'])}} تومان</p>
                </div>

                <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0 h6">تخفیف کالا ها</h5>
                    <p class="mb-0 font-18 text-danger fw-bold">{{number_format($invoice['totalDiscountAmount'])}} تومان</p>
                </div>

                <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0 h6">مجموع</h5>
                    <p class="mb-0 font-18">{{number_format($invoice['totalDiscountPrice'])}} تومان</p>
                </div>

                <div class="action mt-3 d-flex align-items-center justify-content-center">
                    <a href="{{route('client.shipping.index')}}" wire:click="sendInvoice" class="btn main-color-two-bg text-white py-2 rounded-3 rounded-3 d-block w-100">تسویه
                        حساب</a>
                </div>
            </div>
        </div>
        <small class="text-muted d-inline-block my-2 font-13 lh-lg">
            هزینه این سفارش هنوز پرداخت نشده‌ و در صورت اتمام موجودی، کالاها از سبد حذف می‌شوند
        </small>
    </div>
</div>
