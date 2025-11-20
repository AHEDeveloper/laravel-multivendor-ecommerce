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
                            <th scope="col" class="text-center">تصویر</th>
                            <th scope="col" class="text-center">تاریخ</th>
                            <th scope="col" class="text-center">کاربر</th>
                            <th scope="col" class="text-center">گیرنده</th>
                            <th scope="col" class="text-center">مبلغ نهایی</th>
                            <th scope="col" class="text-center">وضعیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orderItems as $order)
                            <tr>

                                <td>{{-- ردیف --}}
                                    {{ $loop->index + 1 }}
                                </td>

                                <td>{{-- کد سفارش --}}
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <img src="/products/{{$order['product']->id}}/small/{{$order['product']->coverImage->path}}" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td>{{--تاریخ--}}
                                    <div class="media">
                                        <div class="media-body align-self-center" wire:ignore>
                                            <h6 class="mb-0">{{jalali($order['created_at'])->format('Y,m,d')}}</h6>
                                            <br>
                                            <h6 class="mb-0">{{jalali($order['created_at'])->format('h:i')}}</h6>
                                            <br>
                                            <h6 class="mb-0">{{$order['created_at']->diffForHumans()}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{--کاربر--}}
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">{{ $order['user']->name }}</h6>
                                            <br>
                                            <h6 class="mb-0">{{ $order['user']->email }}</h6>
                                        </div>
                                    </div>
                                </td>

                                <td>{{-- گیرنده --}}
                                    {{ $order['address']->country->name }},{{$order['address']->state->name}},{{$order['address']->city->name}}
                                    <br>
                                    {{$order['address']->mobile}}
                                    <br>
                                    {{$order['address']->postal_code}}
                                    <br>
                                    {{$order['address']->address}}
                                </td>
                                <td>{{-- مبلغ --}}
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">تومان
                                                {{ number_format($order['price']) }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <select class="form-control bg-{{$order['statusColor']}}"
                                            wire:change="orderStatus({{$order['id']}},$event.target.value)">
                                        <option value="pending"{{$order['status'] == 'pending' ? 'selected' : ''}}>
                                            pending
                                        </option>
                                        <option value="processing"{{$order['status'] == 'processing' ? 'selected' : ''}}>
                                            processing
                                        </option>
                                        <option value="completed"{{$order['status'] == 'completed' ? 'selected' : ''}}>
                                            completed
                                        </option>
                                        <option value="cancelled"{{$order['status'] == 'cancelled' ? 'selected' : ''}}>
                                            cancelled
                                        </option>
                                    </select>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    {{ $orders->links('layouts.admin.pagination') }}--}}
                    {{--                    {{ $products->links('layouts.admin.pagination') }}--}}
                </div>

            </div>
        </div>
    </div>
</div>
