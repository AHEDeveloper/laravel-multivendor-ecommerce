<div class="widget-content widget-content-area ecommerce-create-section mt-4">

    <div class="field-wrapper mb-4" x-data="{isUploading:false,progress:0 }"
         x-on:livewire-upload-start="isUploading=true"
         x-on:livewire-upload-finish="isUploading=false"
         x-on:livewire-upload-error="isUploading=false"
         x-on:livewire-upload-progress="progress=$event.detail.progress"
    >
        <label for="story" class="form-label">استوری</label>
        <input type="file" class="form-control" id="story" wire:model="story" name="story"
               placeholder="">

        <div x-show="isUploading" class="progress mt-3 ltr">
            <div class="progress-bar progress-bar-striped  bg-danger progress-bar-animated"
                 role="progressbar" x-bind:style="`width:${progress}%`" aria-valuenow="10"
                 aria-valuemin="0" aria-valuemax="100"></div>
        </div>

    </div>

    @error('story')
    <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert"
         wire:loading.remove>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <svg> ...</svg>
        </button>
        <strong>خطا !</strong> {{$message}}.</button>
    </div>
    @enderror

</div>

