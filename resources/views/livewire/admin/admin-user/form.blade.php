<div class="col-md-4">

    <div class="col-lg-12 col-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>مدریت ادمین ها</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <div class="form-group mb-4">
                                <label for="name">نام ادمین</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            @error('name')
                            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert" >
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                <strong>خطا!! </strong> {{ $message }}</button>
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-4">
                                <label for="email">ایمیل</label>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                            @error('email')
                            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert" >
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                <strong>خطا!! </strong> {{ $message }}</button>
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-4">
                                <label for="mobile">شماره تماس</label>
                                <input type="text" class="form-control" name="mobile" id="mobile">
                            </div>
                            @error('mobile')
                            <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert" >
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                <strong>خطا!! </strong> {{ $message }}</button>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <label for="selectedRoles" class="form-label">نقش ادمین</label>
                            <select id="selectedRoles" class="form-control" name="selectedRoles" wire:model="selectedRoles" multiple>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('selectedRoles')
                    <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert"
                         wire:loading.remove>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>
                    @enderror
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <label for="selectedPermissions" class="form-label">نقش ادمین</label>
                            <select id="selectedPermissions" class="form-control" name="selectedPermissions" wire:model="selectedPermissions" multiple>
                                @foreach($permissions as $permission)
                                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('selectedPermissions')
                    <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert"
                         wire:loading.remove>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>
                    @enderror


                    <button style="height: 50px" type="submit" class="btn btn-primary _effect--ripple waves-effect waves-light">
                         <span wire:loading.remove >ثبت دسته بندی</span>
                        <div wire:loading class="spinner-border text-white me-2 align-self-center loader-sm "></div>
                    </button>
{{--                     <input type="submit" name="time" class="btn btn-primary">--}}
                </form>

            </div>
        </div>
    </div>

</div>
