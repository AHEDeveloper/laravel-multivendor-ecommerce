<div>
    <div class="row gy-4">
        <div class="col-lg-3">
            <div class="cart-canvases position-sticky top-0">

                <div class="item">

                    <div class="factor">
                        <div class="d-flex factor-item mb-3 align-items-center justify-content-between">
                            <h5 class="fw-bold mb-0 h6">مجموع</h5>
                            <p class="mb-0 font-18">{{number_format($order->amount)}} تومان</p>
                        </div>

                        <div class="action mt-3 d-flex align-items-center justify-content-center">
                            <a href="#" wire:click="submitOrder"
                               class="btn main-color-two-bg text-white py-2 rounded-3 rounded-3 d-block w-100">پرداخت</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
