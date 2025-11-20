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
                            <th scope="col" class="text-center">شماره تلفن</th>
                            <th scope="col" class="text-center">ایمیل</th>
                            <th scope="col" class="text-center">تاریخ</th>
                            <th scope="col" class="text-center">جزییات</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($users as $user)
                            <tr>

                                <td>{{-- ردیف --}}
                                    {{ $loop->iteration + $users->firstItem() -1 }}
                                </td>

                                <td>{{-- شماره تماس --}}
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">{{ $user->mobile }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{--ایمیل--}}
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h6 class="mb-0">{{ $user->email }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{--تاریخ--}}
                                    <div class="media">
                                        <div class="media-body align-self-center" wire:ignore>
                                            <h6 class="mb-0">{{jalali($user->created_at)->format('Y,m,d|h:i')}}</h6>
                                            <br>
                                            <h6 class="mb-0">{{$user->created_at->diffForHumans()}}</h6>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <a href="{{route('admin.order.index')}}?user={{$user->id}}"
                                       class="btn btn-outline-info">مشخصات (
                                        {{$user->orders_count}}
                                        )</a>
                                </td>
us
                            </tr>
                        @endforeach
                        </tbody>
                        {{ $users->links('layouts.admin.pagination') }}
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
