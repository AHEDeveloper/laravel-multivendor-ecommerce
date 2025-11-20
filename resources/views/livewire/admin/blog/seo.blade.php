<div class="widget-content widget-content-area blog-create-section mt-4">

    <h5 class="mb-4">برای بلاگ خود SEO تعریف کنید </h5>

    <div class="row mb-4">
        <div class="col-xxl-12 mb-4">
            <label for="post-meta-description">اسلاگ</label>
            <input type="text" name="slug" wire:model="slug" class="form-control" id="post-meta-title">
            @error('slug')
            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                 role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button>
                <strong>خطا!! </strong> {{ $message }}</button>
            </div>
            @enderror
        </div>

        <div class="col-xxl-12 mb-4">
            <label for="post-meta-description">meta title</label>
            <input type="text" name="meta_title" wire:model="meta_title" class="form-control" id="post-meta-title">
            @error('meta_title')
            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                 role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button>
                <strong>خطا!! </strong> {{ $message }}</button>
            </div>
            @enderror
        </div>

        <div class="col-xxl-12">
            <label for="post-meta-description">meta description</label>
            <textarea name="meta_description" wire:model="meta_description"  class="form-control" id="post-meta-description" cols="10" rows="5"></textarea>
            @error('meta_description')
            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                 role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button>
                <strong>خطا!! </strong> {{ $message }}</button>
            </div>
            @enderror
        </div>

    </div>

</div>
