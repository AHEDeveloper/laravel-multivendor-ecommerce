<div class="col-md-12">

    <div id="tableCustomBasic" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>لیست سفارشات</h4>
                    <div>
                        <input type="search" wire:model.live.debounce.300ms="search">
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">کد سفارش</th>
                            <th scope="col" class="text-center">کاربر</th>
                            <th scope="col" class="text-center">تاریخ</th>
                            <th scope="col" class="text-center">مبلغ نهایی</th>
                            <th scope="col" class="text-center">وضعیت</th>
                            <th scope="col" class="text-center">پرداخت</th>
                            <th scope="col" class="text-center">جزییات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>

                                <td>{{-- ردیف --}}
                                    {{ $loop->iteration + $orders->firstItem() -1 }}
                                </td>

                                <td>{{-- کد سفارش --}}
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">{{ $order->order_number }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{--کاربر--}}
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">{{ $order->user->name }}</h6>
                                            <br>
                                            <h6 class="mb-0">{{ $order->user->email }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{--تاریخ--}}
                                    <div class="media">
                                        <div class="media-body align-self-center" wire:ignore>
                                            <h6 class="mb-0">{{jalali($order->created_at)->format('Y,m,d')}}</h6>
                                            <br>
                                            <h6 class="mb-0">{{jalali($order->created_at)->format('h:i')}}</h6>
                                            <br>
                                            <h6 class="mb-0">{{$order->created_at->diffForHumans()}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{-- مبلغ --}}
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">تومان
                                                {{ number_format($order->amount) }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <select class="form-control bg-{{$order->statusColor}}"
                                            wire:change="orderStatus({{$order->id}},$event.target.value)">
                                        <option class="text-center" value="pending"{{$order->status == 'awaiting_payment' ? 'selected' : ''}}>
                                            awaiting_payment
                                        </option>
                                        <option class="text-center" value="paid"{{$order->status == 'paid' ? 'selected' : ''}}>
                                            paid
                                        </option>
                                        <option class="text-center" value="processing"{{$order->status == 'processing' ? 'selected' : ''}}>
                                            processing
                                        </option>
                                        <option class="text-center" value="completed"{{$order->status == 'completed' ? 'selected' : ''}}>
                                            completed
                                        </option>
                                        <option class="text-center" value="cancelled"{{$order->status == 'cancelled' ? 'selected' : ''}}>
                                            cancelled
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <span class="badge badge-{{$order->statusPaymentColor}}">
                                    <h6>{{$order->payment->status}}</h6>
                                    </span>
                                </td>

                                <td class="text-center">
                                    <a href="{{route('admin.order.detail.index',$order->id)}}"
                                       class="btn btn-outline-info">مشخصات</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links('layouts.admin.pagination') }}
                </div>

            </div>
        </div>
    </div>
</div>
