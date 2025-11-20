<div class="col-lg-4">
    <div class="product-meta">
        <nav aria-label="breadcrumb" class="mb-3">

        </nav>
        <div class="title mt-md-0 mt-3">
            <h1 class="font-16 mb-2">{{$name}}
            </h1>
            <p class="font-12 text-muted font-en">{{$name}}
            </p>
            <div class="d-flex align-items-center pb-2">
                <div class="star">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <i class="bi bi-star"></i>
                </div>
                <div class="ms-3">
                    <a href="" class="main-color-one-color font-14">
                        <span>11</span>
                        <span>دیدگاه</span>
                    </a>
                </div>
                <div class="ms-3">
                    <a href="" class="main-color-one-color font-14">
                        <span>3</span>
                        <span> پرسش</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="product-feature py-2">
            <div class="product-meta-feature-items">
                <h5 class="title font-16 mb-2 icon-circle">ویژگی های کالا</h5>
                <ul class="navbar-nav">
                    @foreach($productFeatures as $productFeature)
                        <li class="nav item"><span>{{$productFeature->categoryFeature->name}}:</span><strong>{{$productFeature->categoryFeatureValue->value}}</strong></li>
                    @endforeach
                </ul>
            </div>
            <div class="product-alert mt-3">
                <i class="bi bi-info-circle-fill me-1"></i>
                <span class="text-justify">امکان برگشت کالا با دلیل "انصراف از خرید" تنها در صورتی مورد قبول است که پلمب کالا باز نشده باشد.</span>
            </div>
            <div class="product-alert mt-2">
                <i class="bi bi-check-circle me-1"></i>
                <span class="text-justify">
                                    از سه روش زیر می‌توان با سامانه همتا ارتباط برقرار نموده و فرآیند فعال سازی دستگاه موبایل را انجام داد: 1. کد دستوری #۷۷۷۷* 2. اپلیکشین همتا 3. سایت اینترنتی به آدرس www.hamta.ntsw.ir
                                </span>
            </div>
        </div>
    </div>
</div>
