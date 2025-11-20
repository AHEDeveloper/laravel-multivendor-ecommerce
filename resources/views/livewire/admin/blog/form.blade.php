<div class="widget-content widget-content-area blog-create-section">

    <div class="row mb-4">
        <label for="long_description" class="form-label">عنوان بلاگ</label>
        <div class="col-sm-12">
            <input type="text" name="name" wire:model="name" class="form-control" id="post-title">
            @error('name')
            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                 role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button>
                <strong>خطا!! </strong> {{ $message }}</button>
            </div>
            @enderror
        </div>
    </div>

    <div class="row mb-4">
        <label for="long_description" class="form-label">دقیقه مطالعه بلاگ</label>
        <div class="col-sm-12">
            <input type="text" name="study_time" wire:model="study_time" class="form-control" id="post-title">
            @error('study_time')
            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                 role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button>
                <strong>خطا!! </strong> {{ $message }}</button>
            </div>
            @enderror
        </div>
    </div>


    <div class="row mb-4">
        <label for="long_description" class="form-label">دسته بندی بلاگ</label>
        <div class="col-sm-12">
            <input type="text" name="category" wire:model="category" class="form-control" id="post-title">
            @error('category')
            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                 role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button>
                <strong>خطا!! </strong> {{ $message }}</button>
            </div>
            @enderror
        </div>
    </div>

    <div class="row mb-4">
        <label for="long_description" class="form-label">توضیحات اصلی</label>
        <div class="col-sm-12" wire:ignore>
            <textarea class="form-control" wire:model='longDescription' name="description" id="editor" cols="50" rows="10"></textarea>
            @error('description')
            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                 role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                    </svg></button>
                <strong>خطا!! </strong> {{ $message }}</button>
            </div>
            @enderror
        </div>
    </div>

    <div class="col-md-12">

        <label for="product-images">عکس وبلاگ</label>
        <div class="field-wrapper" x-data="{ isUploading: false, progress: 0 }"
             x-on:livewire-upload-start="isUploading=true"
             x-on:livewire-upload-finish="isUploading=false" x-on:livewire-upload-error="isUploading=false"
             x-on:livewire-upload-progress="progress=$event.detail.progress">

            <input class="form-control" type="file" wire:model="photo">

            @error('photo.*')
            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                 role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <svg> ...
                    </svg>
                </button>
                <strong>خطا!! </strong> {{ $message }}</button>
            </div>
            @enderror

            <div x-show="isUploading" class="progress mt-3 ltr">
                <div class="progress-bar progress-bar-striped  bg-danger progress-bar-animated" role="progressbar"
                     x-bind:style="`width:${progress}%`" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>

        </div>

   @if($photo)
            @if (in_array($photo->getMimeType(), ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp']))
            <div class="d-flex flex-wrap">
                <div class="item w-25 m-2 ">
                    <img src="{{ $photo->temporaryUrl() }}" class="w-50 rounded">
                </div>
            </div>
            @endif
   @endif
        @if(@$blog->cover)
            <div class="d-flex flex-wrap">
                <div class="item w-25 m-2 ">
                    <img src="/blog/{{ @$blog->id }}/medium/{{ @$blog->cover->path }}" class="w-50 rounded">
                </div>
            </div>
        @endif
    </div>
<br>

    <button style="height: 50px" type="submit" class="btn btn-primary _effect--ripple waves-effect waves-light">
        <span>ثبت بلاگ</span>
    </button>

</div>
