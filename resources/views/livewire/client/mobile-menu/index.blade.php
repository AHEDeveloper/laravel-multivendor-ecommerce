<div class="mobile-footer d-xl-none d-table justify-content-center shadow-box bg-white position-fixed bottom-0 p-2 w-100"
     style="z-index: 11;table-layout: fixed;">
    <ul class="d-table-row">
        <li class="d-table-cell pointer" onclick="topFunction()">
            <div class="mf-link nav-link text-center">
                <span class="d-block mf-link-icon"><i class="bi bi-chevron-up font-20"></i></span>
                <span class="mt-1 font-12 fw-bold mf-link-title">بالا</span>
            </div>
        </li>
        <li class="d-table-cell"><a href="{{route('client.favorite.index')}}" class="mf-link nav-link text-center">
                <div class="mf-link-icon position-relative d-table mx-auto">
                    <i class="bi bi-heart font-20"></i>
                    <span class="position-absolute main-color-one-bg rounded-pill font-10 text-white badge"
                          style="right:-40%;bottom:-5px;">{{$countFavorite}}</span>
                </div>
                <span class="mt-1 font-12 fw-bold mf-link-title">علاقه مندی ها</span>
            </a></li>
        <li class="d-table-cell"><a href="{{route('client.home.index')}}" class="mf-link nav-link text-center">
                <span class="d-block mf-link-icon"><i class="bi bi-house font-20"></i></span>
                <span class="mt-1 font-12 fw-bold mf-link-title">صفحه اصلی</span>
            </a></li>
        <li class="d-table-cell"><a href="{{route('client.shop.index')}}" class="mf-link nav-link text-center">
                <div class="position-relative mf-link-icon d-table mx-auto">
                    <span class="d-block mf-link-icon"><i class="bi bi-arrow-left-right font-20"></i></span>
                    <span class="position-absolute main-color-one-bg rounded-pill font-10 text-white badge"
                          style="right:-60%;bottom:-5px;"></span>
                </div>
                <span class="mt-1 font-12 fw-bold mf-link-title">فروشگاه</span>
            </a></li>
        <li class="d-table-cell">
            <a class="mf-link nav-link text-center" data-bs-toggle="offcanvas" href="#offcanvasCart" role="button" aria-controls="offcanvasCart">
                <div class="position-relative mf-link-icon d-table mx-auto">
                    <span class="d-block mf-link-icon"><i class="bi bi-bag font-20"></i></span>
                    <span class="position-absolute main-color-one-bg rounded-pill font-10 text-white badge"
                          style="right:-60%;bottom:-5px;">{{$countCart}}</span>
                </div>
                <span class="mt-1 font-12 fw-bold mf-link-title">سبد خرید</span>
            </a>
        </li>
    </ul>
</div>
