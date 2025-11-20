<div class="col-lg-3 d-lg-none d-block">
    <div class="custom-filter d-lg-none d-block">
        <button class="btn btn-filter-float border-0 main-color-two-bg shadow-box px-4 py-2 rounded-3 position-fixed" style="z-index: 9;bottom:80px;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="bi bi-funnel font-20 fw-bold text-white"></i>
            <span class="d-block font-14 text-white">فیلتر</span>
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">فیلتر ها</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <aside class="">
                    <section class="mb-4 border-ui shadow-xl filter-container">
                        <!-- Adding a heading for SEO purposes, but hiding it visually -->
                        <h4 class="section-title visually-hidden">جستجوی محصولات</h4> <!-- Hidden from view but present for SEO -->
                        <label for="search-products-filter" class="filter-title">جستجو محصولات</label>
                        <div class="position-relative">
                            <input id="search-products-filter" type="text" class="form-control py-3 rounded-4 w-100 bs-bg-gray-100" placeholder="جستجوی محصول ...">
                            <span class="position-absolute me-3 end-0 top-50 translate-middle-y"><i class="bi bi-search"></i></span>
                        </div>
                    </section>
                    <section class="mb-4 border-ui shadow-xl filter-container">
                        <h2 class="filter-title">فیلتر قیمت</h2>
                        <div class="d-flex align-items-center flex-wrap">
                            <a href="#" class="btn m-1 ms-0 btn-outline-dark btn-sm align-items-center d-flex justify-content-between"><i class="bi bi-x float-end"></i>موجودی</a>
                            <a href="#" class="btn m-1 ms-0 btn-outline-dark btn-sm align-items-center d-flex justify-content-between"><i class="bi bi-x float-end"></i>تخفیف خورده</a>
                            <a href="#" class="btn m-1 ms-0 btn-outline-dark btn-sm align-items-center d-flex justify-content-between"><i class="bi bi-x float-end"></i>قرمز</a>
                            <a href="#" class="btn m-1 ms-0 btn-outline-dark btn-sm align-items-center d-flex justify-content-between"><i class="bi bi-x float-end"></i>سبز</a>
                            <a href="#" class="btn m-1 ms-0 btn-outline-dark btn-sm align-items-center d-flex justify-content-between"><i class="bi bi-x float-end"></i>آبی</a>
                        </div>
                    </section>
                    <section class="mb-4 border-ui shadow-xl filter-container">
                        <h2 class="filter-title">فیلتر قیمت</h2>
                        <div class="filter-price">
                            <div class="filter-slider">
                                <div class="price-slider"></div>
                            </div>
                            <ul class="filter-range mb-4">
                                <li>
                                    <input type="text" data-value="0" value="0" name="price[min]" data-range="0" class="js-slider-range-from min-price-filter" disabled>
                                    <span>تومان</span>
                                </li>
                                <li class="label fw-bold">تا</li>
                                <li>
                                    <input type="text" data-value="17700000" value="17700000" name="price[max]" data-range="17700000" class="js-slider-range-to max-price-filter" disabled>
                                    <span>تومان</span>
                                </li>
                            </ul>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="available-products-filter">
                            <label class="form-check-label mt-1" for="available-products-filter">محصولات موجود</label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="discounted-products-filter">
                            <label class="form-check-label mt-1" for="discounted-products-filter">فقط تخفیف خورده‌ها</label>
                        </div>
                    </section>
                    <section class="mb-4 border-ui shadow-xl filter-container">
                        <h2 class="filter-title">رنگ‌ها</h2>
                        <div class="d-flex flex-wrap">
                            <div class="color-box position-relative" style="background-color: black;" onclick="selectColor(this)">
                                <i class="bi bi-check text-white position-absolute check-icon"></i>
                            </div>
                            <div class="color-box position-relative" style="background-color: gray;" onclick="selectColor(this)">
                                <i class="bi bi-check text-white position-absolute check-icon"></i>
                            </div>
                            <div class="color-box position-relative" style="background-color: white; border: 1px solid #aaa;" onclick="selectColor(this)">
                                <i class="bi bi-check text-dark position-absolute check-icon"></i>
                            </div>
                            <div class="color-box position-relative" style="background-color: red;" onclick="selectColor(this)">
                                <i class="bi bi-check text-white position-absolute check-icon"></i>
                            </div>
                            <div class="color-box position-relative" style="background-color: orange;" onclick="selectColor(this)">
                                <i class="bi bi-check text-white position-absolute check-icon"></i>
                            </div>
                            <div class="color-box position-relative" style="background-color: blue;" onclick="selectColor(this)">
                                <i class="bi bi-check text-white position-absolute check-icon"></i>
                            </div>
                        </div>
                    </section>
                    <section class="mb-4 border-ui shadow-xl filter-container">
                        <h2 class="filter-title">برند</h2>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="brand-aeg-filter">
                            <label class="form-check-label font-16" for="brand-aeg-filter">AEG</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="brand-asus-filter">
                            <label class="form-check-label font-16" for="brand-asus-filter">ایسوس</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="brand-panasonic-filter">
                            <label class="form-check-label font-16" for="brand-panasonic-filter">پاناسونیک</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="brand-sony-filter">
                            <label class="form-check-label font-16" for="brand-sony-filter">سونی</label>
                        </div>
                    </section>
                    <section class="mb-4 border-ui shadow-xl filter-container">
                        <h2 class="filter-title">وضعیت</h2>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input px-3" name="hasStock" type="checkbox" role="switch" id="stock-available-filter" checked onchange="document.getElementById('stock-unavailable-filter').checked = false">
                            <label class="form-check-label" for="stock-available-filter">موجود</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input px-3" name="hasStock" type="checkbox" role="switch" id="stock-unavailable-filter" onchange="document.getElementById('stock-available-filter').checked = false">
                            <label class="form-check-label" for="stock-unavailable-filter">ناموجود</label>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>
</div>

