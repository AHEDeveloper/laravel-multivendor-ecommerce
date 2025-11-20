<div class="container mx-auto align-self-center">

    <div class="row">

        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
            <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))" class="card mt-3 mb-3">

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 mb-3">

                            <h2>ورود</h2>
                            <p>برای ورود به پنل مدریت ایمیل و رمز حود را وارد کنید</p>

                        </div>
                        <div class="col-md-12/admin
                            <div class=" mb-3
                        ">
                        <label class="form-label">ایمیل</label>
                        <input type="email" name="email" class="form-control">
                        @error('email')
                        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert" >
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                            <strong>خطا!! </strong> {{ $message }}</button>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-4">
                        <label class="form-label">رمز ورود</label>
                        <input type="text" name="password" class="form-control">
                        @error('password')
                        <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4 mt-2" role="alert" >
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                            <strong>خطا!! </strong> {{ $message }}</button>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <div class="form-check form-check-primary form-check-inline">
                            <input class="form-check-input me-3" type="checkbox" id="form-check-default">
                            <label class="form-check-label" for="form-check-default">
                                منو به خاطر بسپار
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-4">
                        <button class="btn btn-secondary w-100">ورود</button>
                    </div>
                </div>

                @if(session()->has('message'))
                    <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4">
                        {{session('message')}}
                    </div>
                @endif
            </form>

        </div>
    </div>
</div>

</div>

</div>

