<div class="col-md-4">

    <div class="col-lg-12 col-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>مدریت دسته بندی</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="form-group mb-4">
                                <label for="formGroupExampleInput">ساخت دسته بندی</label>
                                <input type="text" class="form-control" name="name" wire:model='name' id="formGroupExampleInput">
                            </div>

                            @error('name')
                            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert" >
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                <strong>خطا!! </strong> {{ $message }}</button>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <label for="category" class="form-label">دسته بندی والد</label>
                            <select id="category" class="form-control" name="parent_id" wire:model="parent_id" placeholder="انتخاب دسته بندی والد" autocomplete="off">
                                <option value="">دسته بندی والد</option>
                                @foreach($categorys as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                @error('parent_id')
                                <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert"
                                     wire:loading.remove>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <svg> ...</svg>
                                    </button>
                                    <strong>خطا !</strong> {{$message}}.</button>
                                </div>
                                @enderror
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <label for="product-images">عکس دسته بندی</label>
                            <div class="field-wrapper" x-data="{ isUploading: false, progress: 0 }"
                                 x-on:livewire-upload-start="isUploading=true"
                                 x-on:livewire-upload-finish="isUploading=false" x-on:livewire-upload-error="isUploading=false"
                                 x-on:livewire-upload-progress="progress=$event.detail.progress">

                                <input class="form-control" type="file" wire:model="photo">
                                @error('photo')
                                <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2"
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
                            <div class="d-flex flex-wrap">
                                @if ($photo && in_array($photo->getMimeType(), ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp']))
                                    <div class="item w-25 m-2 ">
                                        <img src="{{ $photo->temporaryUrl() }}" class="w-100 rounded">
                                        <div class="d-flex justify-content-between mt-2 ">
                                            <a href="javascript:0" class="action-btn text-danger btn-delete bs-tooltip">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     wire:click="removePhoto"
                                                     width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                    </path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>


                    </div>
                        <br>
                    <button style="height: 50px" type="submit" class="btn btn-primary _effect--ripple waves-effect waves-light">
                         <span wire:loading.remove >ثبت دسته بندی</span>
                        <div wire:loading class="spinner-border text-white me-2 align-self-center loader-sm "></div>
                    </button>
                    {{-- <input type="submit" name="time" class="btn btn-primary"> --}}
                </form>

            </div>
        </div>
    </div>

</div>
