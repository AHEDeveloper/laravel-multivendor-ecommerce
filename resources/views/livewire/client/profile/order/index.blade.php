<div>
    <section class="content my-xl-3 my-5 py-xl-4 py-5">
        <div class="container-fluid">
            <div class="row gy-3">
                <!-- side nav -->
                <livewire:client.profile.card-profile.index>
                <!-- main content -->
                <div class="col-xl-9">
                    <div class="section-title mb-3">
                        <div class="section-title-title">
                            <h2 class="fw-900 h4">آخرین<span class="with-highlight ms-1">سفارشات</span>
                            </h2>
                            <div class="Dottedsquare"></div>
                        </div>
                    </div>
                    <!-- order -->
                    <div class="order-widget mt-4">
                        <ul class="nav nav-tabs mt-3 border-0" id="orderTabs">

                            <li class="nav-item">
                                <a class="nav-link cart-tab {{$activeTab == 1 ? 'active' : ''}}" wire:click="orderTab(1)" data-bs-toggle="tab" href="#current">جاری</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  cart-tab {{$activeTab == 2 ? 'active' : ''}}" wire:click="orderTab(2)" data-bs-toggle="tab" href="#delivered">تحویل شده</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link cart-tab {{$activeTab == 3 ? 'active' : ''}}" wire:click="orderTab(3)" data-bs-toggle="tab" href="#returned">لغو شده</a>
                            </li>
                        </ul>

                        <div class="tab-content mt-3">
                            <div class="tab-pane fade {{$activeTab == 1 ? 'show active' : ''}}" id="current">
                                <div class="orders-container">
                                    <div class="orders">
                                        @if($orderCurrents->count() == null)
                                            <div class="empty-state">
                                                <img src="/client/assets/image/no-food.gif" alt="جعبه خالی">
                                                <p class="mt-2 text-muted">سفارش ثبت نشده نداریم!!</p>
                                            </div>
                                        @endif
                                       @foreach($orderCurrents as $current)
                                                <div class="order-item">
                                                    <a href="{{route('client.checkout.index',$current->order_number)}}">
                                                        <div class="order-item-status">
                                                            <div class="order-item-status-item">
                                                                <p>
                                                                    <span style="color: #c4bb00">سفارش های در انتظار پردخت</span></p>
                                                            </div>
                                                            <div class="order-item-status-item">
                                                                <p><i class="bi bi-arrow-left pointer text-dark"></i>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="order-item-detail">
                                                            <ul class="nav">
                                                                <li class="nav-item text-muted">
                                                                    {{ jalali($current->created_at)->format('d, %B, Y') }}
                                                                </li>
                                                                <li class="nav-item">
                                                                    <span class="text-mute">کد سفارش</span>
                                                                    <strong>{{$current->order_number}}</strong>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <span class="text-mute">مبلغ</span>
                                                                    <strong>{{number_format($current->amount)}} تومان</strong>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="order-item-product-list">
                                                            @foreach($current->orderItems as $item)
                                                                <div class="order-item-product-list-item">
                                                                    <img src="/products/{{$item->product->id}}/small/{{$item->product->coverImage->path}}" alt="" class="img-thumbnail" width="70" height="70">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </a>

                                                    <div class="order-item-show">
                                                        <a href="{{route('client.factor.index')}}">
                                                            <p><i class="bi bi-card-list"></i> مشاهده فاکتور</p>

                                                        </a>
                                                    </div>
                                                </div>
                                       @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{$activeTab == 2 ? 'show active' : ''}}" id="delivered">
                                <div class="orders-container">
                                    <div class="orders">
{{--                                        @dd(count($orderCompleteds) == 0)--}}
                                        @if(count($orderCompleteds) == 0)
                                        <div class="empty-state">
                                                <img src="/client/assets/image/no-food.gif" alt="جعبه خالی">
                                                <p class="mt-2 text-muted">سفارش تحویل داده شده نداریم!!</p>
                                            </div>
                                        @endif
                                        @foreach($orderCompleteds as $completed)
                                            <div class="order-item">
                                                <a href="javascript:void(0)">
                                                    <div class="order-item-status">
                                                        <div class="order-item-status">
                                                            <div class="order-item-status-item">
                                                                <p><i class="bi bi-bag-check-fill"></i>
                                                                    <span>تحویل شده</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="order-item-status-item">
                                                            <p><i class="bi bi-arrow-left pointer text-dark"></i>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="order-item-detail">
                                                        <ul class="nav">
                                                            <li class="nav-item text-muted">
                                                                {{ jalali($completed->created_at)->format('d, %B, Y') }}
                                                            </li>
                                                            <li class="nav-item">
                                                                <span class="text-mute">کد سفارش</span>
                                                                <strong>{{$completed->order_number}}</strong>
                                                            </li>
                                                            <li class="nav-item">
                                                                <span class="text-mute">مبلغ</span>
                                                                <strong>{{number_format($completed->amount)}} تومان</strong>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="order-item-product-list">
                                                        @foreach($completed->orderItems as $item)
                                                            <div class="order-item-product-list-item">
                                                                <img src="/products/{{$item->product->id}}/small/{{$item->product->coverImage->path}}" alt="" class="img-thumbnail" width="70" height="70">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </a>

                                                <div class="order-item-show">
                                                    <a href="{{route('client.factor.index')}}">
                                                        <p><i class="bi bi-card-list"></i> مشاهده فاکتور</p>

                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{$activeTab == 3 ? 'show active' : ''}}" id="returned">
                                <div class="orders-container">
                                    <div class="orders">
                                        @if(count($orderCancelled) == 0)
                                        <div class="empty-state">
                                                <img src="/client/assets/image/no-food.gif" alt="جعبه خالی">
                                                <p class="mt-2 text-muted">سفارش لغو شده نداریم!!</p>
                                            </div>
                                        @endif
                                        @foreach($orderCancelled as $cancelled)
                                            <div class="order-item">
                                                <a href="javascript:void(0)">
                                                    <div class="order-item-status">
                                                        <div class="order-item-status">
                                                            <div class="order-item-status-item">
                                                                <p><span style="color: #ff0000"> لغو شده</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order-item-detail">
                                                        <ul class="nav">
                                                            <li class="nav-item text-muted">
                                                                {{ jalali($cancelled->created_at)->format('d, %B, Y') }}
                                                            </li>
                                                            <li class="nav-item">
                                                                <span class="text-mute">کد سفارش</span>
                                                                <strong>{{$cancelled->order_number}}</strong>
                                                            </li>
                                                            <li class="nav-item">
                                                                <span class="text-mute">مبلغ</span>
                                                                <strong>{{number_format($cancelled->amount)}} تومان</strong>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="order-item-product-list">
                                                        @foreach($cancelled->orderItems as $item)
                                                            <div class="order-item-product-list-item">
                                                                <img src="/products/{{$item->product->id}}/small/{{$item->product->coverImage->path}}" alt="" class="img-thumbnail" width="70" height="70">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </a>

                                                <div class="order-item-show">
                                                    <a href="{{route('client.factor.index')}}">
                                                        <p><i class="bi bi-card-list"></i> مشاهده فاکتور</p>

                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
