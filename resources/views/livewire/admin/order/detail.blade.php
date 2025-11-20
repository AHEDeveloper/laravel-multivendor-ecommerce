@push('links')
    <link href="/admin/src/assets/css/dark/apps/invoice-preview.css" rel="stylesheet" type="text/css"/>
@endpush
<div>
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="doc-container">

                <div class="row">

                    <div class="col-xl-9">

                        <div class="invoice-container">
                            <div class="invoice-inbox">

                                <div id="ct" class="">

                                    <div class="invoice-00001">
                                        <div class="content-section">

                                            <div class="inv--head-section inv--detail-section">

                                                <div class="row">

                                                    <div class="col-sm-6 col-12 mr-auto">
                                                        <div class="d-flex">
                                                            <img class="company-logo rounded-3"
                                                                 src="{{$orderDetails->user->picture}}" alt="company">
                                                            <h3 class="in-heading align-self-center">{{$orderDetails->user->name}}</h3>
                                                        </div>
                                                        <p class="inv-street-addr mt-3">{{$orderDetails->user->email}}</p>
                                                        <p class="inv-email-address">{{$orderDetails->user->mobile}}</p>
                                                        <p class="inv-email-address">(120) 456 789</p>
                                                    </div>

                                                    <div class="col-sm-6 text-sm-end" wire:ignore>
                                                        <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4"><span
                                                                class="inv-title">Invoice : </span> <span
                                                                class="inv-number">{{$orderDetails->order_number}}</span>
                                                        </p>
                                                        <p class="inv-created-date mt-sm-5 mt-3"><span
                                                                class="inv-title">تاریخ ثبت : </span> <span
                                                                class="inv-date">{{jalali($orderDetails->created_at)->format('Y, m ,d | h:i')}}</span></p>

                                                        @if($orderDetails->created_at != $orderDetails->updated_at)
                                                            <p class="inv-due-date"><span
                                                                    class="inv-title">تاریخ اپدیت : </span> <span
                                                                    class="inv-date">{{jalali($orderDetails->updated_at)->format('Y m d | h:i')}}</span></p>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="inv--detail-section inv--customer-detail-section">

                                                <div class="row">

                                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                        <p class="inv-to">جزییات پرداخت</p>
                                                    </div>


                                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4" wire:ignore>
                                                        <p class="inv-customer-name">شماره کارت:
                                                            {{$orderDetails->payment->cardNumber}}
                                                        </p>
                                                        <p class="inv-customer-name">شماره مرجع:
                                                            {{$orderDetails->payment->refNumber}}
                                                        </p>
                                                        <p class="inv-street-addr">درگاه:
                                                            {{$orderDetails->paymentMethod->name}}
                                                        </p>
                                                        <p  class="inv-email-address badge text-white badge-{{$orderDetails->statusColorPayment}}">
                                                            وضعیت پرداخت:
                                                            {{$orderDetails->payment->status}}
                                                        </p>
                                                        <p class="inv-email-address">(128) 666 070</p>
                                                    </div>

                                                    <div
                                                        class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                                        <p class="inv-customer-name">Oscar Garner</p>
                                                        <p class="inv-street-addr">2161 Ferrell Street, MN, 56545 </p>
                                                        <p class="inv-email-address">info@mail.com</p>
                                                        <p class="inv-email-address">(218) 356 9954</p>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="inv--product-table-section">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="">
                                                        <tr>
                                                            <th scope="col">ردیف</th>
                                                            <th scope="col">تصویر محصول</th>
                                                            <th scope="col">نام محصول</th>
                                                            <th class="text-end" scope="col">تعداد</th>
                                                            <th class="text-end" scope="col">قیمت محصول</th>
                                                            <th class="text-end" scope="col">جمع قیمت</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($orderDetails->orderItems as $detail)
                                                            <tr>
                                                                <td>{{$loop->index+1}}</td>
                                                                <td>
                                                                    <img
                                                                        src="/products/{{ $detail->product->id }}/small/{{ @$detail->product->coverImage->path }}"
                                                                        alt="">
                                                                </td>
                                                                <td>{{$detail->product->name}}</td>
                                                                <td class="text-end">{{$detail->quantity}}</td>
                                                                <td class="text-end">{{number_format($detail->price)}}</td>
                                                                <td class="text-end">{{number_format($detail->price*$detail->quantity)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="inv--total-amounts">

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="text-sm-end">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total :</p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$3155</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax 10% :</p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$315</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Shipping :</p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$10</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount 5% :</p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$150</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title mt-3">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount mt-3">
                                                                    <h4 class="">$3480</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="inv--note">

                                                <div class="row mt-4">
                                                    <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                        <p>Note: Thank you for doing Business with us.</p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>

                    <div class="col-xl-3">

                        <div class="invoice-actions-btn">

                            <div class="invoice-action-btn">

                                <div class="row">
                                    <select class="form-control bg-{{$statusColor}}"
                                            wire:change="orderStatus({{$orderDetails->id}},$event.target.value)">
                                        <option value="pending"{{$orderDetails->status == 'pending' ? 'selected' : ''}}>
                                            pending
                                        </option>
                                        <option value="processing"{{$orderDetails->status == 'processing' ? 'selected' : ''}}>
                                            processing
                                        </option>
                                        <option value="completed"{{$orderDetails->status == 'completed' ? 'selected' : ''}}>
                                            completed
                                        </option>
                                        <option value="cancelled"{{$orderDetails->status == 'cancelled' ? 'selected' : ''}}>
                                            cancelled
                                        </option>
                                    </select>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
    {
</div>
