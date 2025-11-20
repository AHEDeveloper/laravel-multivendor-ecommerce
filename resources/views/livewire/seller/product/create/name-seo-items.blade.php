<div class="widget-content widget-content-area ecommerce-create-section">

    <div class="row mb-4">
        <div class="col-sm-12">
            <label for="name">نام محصول</label>
            
            <input type="text" class="form-control" name="name" id="name"   wire:model.live.debounce.300ms="name">
        </div>
    </div>

    @error('name')
        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
            role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                </svg></button>
            <strong>خطا!! </strong> {{ $message }}</button>
        </div>
    @enderror

    <div class="row mb-4">
        <div class="col-sm-12">
            <label for="slug">اسلاگ</label>
            <input type="text" class="form-control" name="slug" id="slug" wire:model="slug" value="{{ @$product->seo->slug }}"
                readonly>
        </div>
    </div>

    @error('slug')
        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
            role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                </svg></button>
            <strong>خطا!! </strong> {{ $message }}</button>
        </div>
    @enderror

    <div class="row mb-4">
        <div class="col-sm-12">
            <label for="meta_title">عنوان متا</label>
            <input type="text" class="form-control" name="meta_title" wire:model.live="beta" value="{{ @$product->seo->meta_title }}"
                id="meta_title">
        </div>
    </div>

    @error('meta_title')
        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
            role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                </svg></button>
            <strong>خطا!! </strong> {{ $message }}</button>
        </div>
    @enderror

    <div class="row mb-4">
        <div class="col-sm-12">
            <label for="meta_discription">توضیحات متا</label>
            <textarea name="meta_description" class="form-control" id="meta_discription" rows="6">{{ @$product->seo->meta_description}}</textarea>
        </div>
    </div>

    @error('meta_description')
    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
        role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
            </svg></button>
        <strong>خطا!! </strong> {{ $message }}</button>
    </div>
    @enderror

</div>