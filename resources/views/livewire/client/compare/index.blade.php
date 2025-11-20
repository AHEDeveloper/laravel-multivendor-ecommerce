<div>
    <section class="content">
        <div class="bread-crumb py-0 mb-3">
            <div class="container-fluid">
                <div class="content-box">
                    <div class="container-fluid">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#" class="font-14 text-muted">خانه</a></li>
                                <li class="breadcrumb-item"><a href="#" class="font-14 text-muted">فروشگاه</a></li>
                                <li class="breadcrumb-item"><a href="#" class="font-14 text-muted">گوشی هوشمند</a></li>
                                <li class="breadcrumb-item active main-color-one-color font-14" aria-current="page">گوشی
                                    شیائومی
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="content-box">
                <div class="compare">
                    <div class="table-responsive">
                        <table class="table table-bordered fixed compare-table">
                            <!-- head -->
                            <tbody>

                            <tr>
                                @foreach($compares as $compare)
                                    <td>
                                        <div class="product-box border-ui">

                                            <a href="">
                                                <div class="product-image">
                                                    <img
                                                        src="/products/{{$compare->id}}/medium/{{$compare->coverImage->path}}"
                                                        loading="lazy" alt="" class="img-fluid one-image">
                                                    <img
                                                        src="/products/{{$compare->id}}/medium/{{$compare->coverImageNull->path}}"
                                                        loading="lazy" alt="" class="img-fluid two-image">
                                                </div>
                                                <div class="d-flex h-80-px align-items-center justify-content-between ">
                                                    <h6 class="font-14 text-overflow-2 my-3 lh-lg">{{$compare->name}}</h6>
                                                </div>
                                                <div class="product-action bs-bg-gray-200 border-ui  rounded-3">
                                                    <div class="discount mt-1">
                                                        <span class="btn main-color-one-bg"><i
                                                                class="bi bi-cart"></i></span>
                                                    </div>
                                                    <div
                                                        class="price d-flex justify-content-end flex-column align-content-end">
                                                        <p class="new-price me-0 text-end">{{number_format($compare->price)}}
                                                            <span class="fw-normal">تومان</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="compare-box my-2">
                                            <div class="compare-delete text-center">
                                                <a href="" class="btn btn-danger btn-sm" data-hint="حذف از مقایسه"><i
                                                        class="bi bi-x-circle-fill"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                @endforeach
                                <td>
                                    <div class="compare-add">
                                        <div class="compare-add-product">
                                            <div class="cap-icon">
                                                <i class="bi bi-box-arrow-down"></i>
                                            </div>
                                            <div class="cap-title">
                                                <p class="text-muted">برای افزودن محصول کلیک کنید</p>
                                            </div>
                                            <div class="cap-btn">
                                                <button class="btn border-0 main-color-one-bg">افزودن کالا به مقایسه
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- body -->

                            @foreach($productFeatutes as $item)
                                <tr>
                                    <td colspan="4" class="td-head">
                                        <i class="bi bi-chevron-double-left "></i>
                                        <span>{{$item->categoryFeature->name}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{$item->categoryFeatureValue->value}}</td>
                                    <td>{{$item->categoryFeatureValue->value}}</td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
