<div class="col-xxl-12 col-xl-4 col-lg-4 col-md-5 mt-4">
    <div class="widget-content widget-content-area ecommerce-create-section">
         <div class="row">
            <div class="col-sm-12 mb-4">
                <label for="regular-price">درصد تخفیف</label>
                <input type="text" value="{{ @$product->discount }}" name="discount" class="form-control" id="regular-price" >
            </div>
            @error('discount')
                <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                        </svg></button>
                    <strong>خطا!! </strong> {{ $message }}</button>
                </div>
            @enderror

            <div class="col-sm-12 mb-4">
                <label for="sale-price">تاریخ انقضا</label>
                <input type="date"  name="discount_duration" class="form-control" id="sale-price" value="{{ @$product->discount_duration }}">
            </div>
            @error('discount_duration')
                <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                        </svg></button>
                    <strong>خطا!! </strong> {{ $message }}</button>
                </div>
            @enderror

            <div class="col-xxl-12 mb-4">
                <div class="switch form-switch-custom switch-inline form-switch-secondary">
                    <input class="switch-input" {{ @$product->featured == true ? 'checked' : '' }} type="checkbox"
                        name="featured" role="switch" value="{{ @$product->featured }}" id="in-stock">
                    <label class="switch-label" for="in-stock">کالای ویژه</label>
                </div>
            </div>

            <div class="col-sm-12">
                <button class="btn btn-success w-100 _effect--ripple waves-effect waves-light">

                    <span wire:loading.remove>ذخیره کردن</span>
                    <div wire:loading class="spinner-border text-white me-2 align-self-center loader-sm "></div>

                </button>

            </div>
        </div>
    </div>

</div>

