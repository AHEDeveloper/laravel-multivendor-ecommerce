<div class="col-xl-3">
    <!--   start panel menu mobile  -->
    <div class="custom-filter d-xl-none d-block">
        <button class="btn btn-filter-float border-0 btn-dark shadow-box px-4 rounded-3 position-fixed"
                style="z-index: 999;bottom:75px;" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="bi bi-funnel font-20 fw-bold text-white"></i>
            <span class="d-block font-14 text-white">منو</span>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel1">منو</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <aside class="profile-card">
                    <div class="profile-header d-flex align-items-center">
                        <img src="assets/image/user/user.png" alt="کاربر">
                        <div class="ms-3">
                            <h6 class="mt-2">امیر رضایی</h6>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="text-muted small mt-1">طراح و برنامه نویس</p>
                                <a href="" class="ms-2"><i class="bi bi-pencil-square"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="profile-menu">
                        <a href="#" class="active"><i class="bi bi-shop-window"></i> خلاصه فعالیت</a>
                        <a href="#"><i class="bi bi-bag"></i> سفارش‌ها</a>
                        <a href="#"><i class="bi bi-bell"></i> دیدگاه‌ها</a>
                        <a href="#"><i class="bi bi-heart"></i> لیست علاقه‌مندی</a>
                        <a href="#"><i class="bi bi-person"></i> اطلاعات حساب کاربری</a>
                        <a href="#" class="logout"><i class="bi bi-box-arrow-right"></i> خروج</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!--   end panel menu mobile   -->

    <!--   start panel menu desktop  -->
    <aside class="profile-card d-xl-block d-none">
        <div class="profile-header d-flex align-items-center">
            @if(Auth::user()->cover)
                <img class="rounded-circle border border-3 border-white shadow-sm"
                     src="/avatars/{{\Illuminate\Support\Facades\Auth::id()}}/{{\Illuminate\Support\Facades\Auth::user()->cover->path}}"
                     alt="Maxwell Admin"
                     style="width: 75px; height: 75px; object-fit: cover;">
            @endif
            <div class="ms-3">
                <h6 class="mt-2">{{\Illuminate\Support\Facades\Auth::user()->name}}</h6>
                <div class="d-flex align-items-center justify-content-between">
                </div>
            </div>
        </div>
        <div class="profile-menu">
            <a href="#" class=""><i class="bi bi-shop-window"></i> خلاصه فعالیت</a>
            <a href="{{route('client.order.index')}}" class="{{$route == "client.order.index" ? 'active' : ''}}"><i class="bi bi-bag"></i> سفارش‌ها</a>
            <a href="#"><i class="bi bi-bell"></i> دیدگاه‌ها</a>
            <a href="{{route('client.favorite.index')}}" class="{{$route == "client.favorite.index" ? 'active' : ''}}">
                <i class="bi bi-heart"></i> لیست علاقه‌مندی</a>
            <a href="{{route('client.profile-information.index')}}"
               class="{{$route == "client.profile-information.index" ? 'active' : ''}}"><i class="bi bi-person"></i>
                اطلاعات حساب کاربری</a>
            <a href="#">
                <img src="{{asset('/client/assets/image/icon8/address.png')}}" style="width: 15px;height: 15px">
                ادرس های شما</a>
            <a href="#" class="logout"><i class="bi bi-box-arrow-right"></i> خروج</a>
        </div>
    </aside>
    <!--   end panel menu desktop  -->
</div>

