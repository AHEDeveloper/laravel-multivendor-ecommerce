<div>
    @if($paymentStatus == true)
        <div class="row mt-3 justify-content-center">
            <div class="col-lg-4">
                <div class="alert-box ab-success pyemy">
                    <div class="title mt-3">
                        <h5 class="h5 fw-900 main-color-two-color">پرداخت موفق! سفارش شما ثبت شد.</h5>
                    </div>
                    <div class="desc">
                        <div class="payment-status">
                            <div class="pay-table">
                                <div class="pay-table-title">
                                    <h5 class="font-18">مشخصات پرداختی</h5>
                                </div>
                                <div class="pay-table-item">
                                    <h6 class="font-16">درگاه پرداختی</h6>
                                    <p class="mb-0">{{session()->get('portalName')}}</p>
                                </div>
                                <div class="pay-table-item">
                                    <h6 class="font-16">تاریخ</h6>
                                    <p class="mb-0">{{jalali($payment->created_at)->format('Y,m,d')}}</p>
                                </div>
                                <div class="pay-table-item">
                                    <h6 class="font-16">شماره تراکنش</h6>
                                    <p class="mb-0">
                                        {{session('paymentSuccess')}}
                                    </p>
                                </div>
                                <div class="pay-table-item">
                                    <h6 class="font-16">کد سفارش</h6>
                                    <h6 class="mb-0">
                                        {{session('orderNumber')}}

                                    </h6>
                                </div>
                                <div class="pay-table-item">
                                    <h6 class="font-16 text-danger">کاربر خریدار</h6>
                                    <p class="mb-0 text-danger">{{$payment->user->name}}</p>
                                </div>
                                <div class="pay-table-item">
                                    <h6 class="font-16">مقدار پرداختی</h6>
                                    <p class="mb-0 main-color-green-color">{{number_format($payment->amount)}} تومان</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="action d-sm-block d-grid gap-2">
                        <a href="{{route('client.home.index')}}" class="btn border-0 rounded-pill text-white main-color-two-bg">بازگشت به صفحه
                            اصلی</a>
                        <a href="" class="btn border-0 ms-2 rounded-pill main-color-one-bg">پنل کاربری</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row mt-3 justify-content-center">
            <div class="col-lg-4">
                <div class="alert-box alert-box ab-nsuccess">
                    <div class="title mt-3">
                        <h5 class="h5 fw-900">پرداخت ناموفق!</h5>
                    </div>
                    <div class="desc">
                        <div class="payment-status">
                            <div class="pay-table">
                                <div class="pay-table-title">
                                    <h5 class="font-18">مشخصات تراکنش</h5>
                                </div>
                                <div class="pay-table-item">
                                    <h6 class="font-16">درگاه پرداختی</h6>
                                    <p class="mb-0">{{session()->get('portalName')}}</p>
                                </div>
                                <div class="pay-table-item">
                                    <h6 class="font-16">تاریخ</h6>
                                    <p class="mb-0"> {{ jalali($payment->created_at)->format('d, %B, Y') }}</p>
                                </div>
                                <div class="pay-table-item">
                                    <h6 class="font-16">کد سفارش</h6>
                                    <p class="mb-0">
                                        {{session('orderNumber')}}

                                    </p>
                                </div>
                                <div class="pay-table-item">
                                    <h6 class="font-16 text-danger">وضعیت</h6>
                                    <p class="mb-0 text-danger fw-bold">{{session('paymentError')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="action d-sm-block d-grid gap-2">
{{--                        @dd($payment->order_number)--}}
                        <form>
                            <a href="{{route('client.checkout.index',$orderNumber)}}" class="btn border-0 rounded-pill main-color-one-bg w-100 py-3">پرداخت دوباره</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endif


{{--    @if(session('paymentError'))--}}
{{--        <h3>{{session('paymentError')}}</h3>--}}
{{--    @endif--}}
</div>
