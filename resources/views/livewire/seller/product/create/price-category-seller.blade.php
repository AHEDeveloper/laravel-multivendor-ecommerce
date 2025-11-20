<div class="col-xxl-12 col-xl-8 col-lg-8 col-md-7 mt-xxl-0 mt-4">
    <div class="widget-content widget-content-area ecommerce-create-section">
         <div class="row">
            <div class="col-xxl-12 col-md-6 mb-4">
                <label for="stock">قیمت محصول</label>
                <input type="text" name="price" class="form-control" id="stock" value="{{ @$product->price }}">
            </div>
            @error('price')
                <div wire:loading.remove
                    class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!! </strong> {{ $message }}</button>
                </div>
            @enderror

            <div class="col-xxl-12 col-md-6 mb-4">
                <label for="proSKU">موجودی محصول</label>
                <input type="text" name="stock" class="form-control" id="proSKU" value="{{ @$product->stock }}">
            </div>
            @error('stock')
                <div wire:loading.remove
                    class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!! </strong> {{ $message }}</button>
                </div>
            @enderror

            <div class="col-xxl-12 col-md-6 mb-4">
                <label for="category">دسته بندی</label>
                <select class="form-select" id="category" name="categoryId">
                    @foreach ($categorys as $category)
                        <option value="{{ @$category->id }}"{{ @$category->id == @$product->category_id ? 'selected' : '' }}>{{ @$category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('categoryId')
                <div wire:loading.remove
                    class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!! </strong> {{ $message }}</button>
                </div>
            @enderror

        </div>

    </div>

</div>

