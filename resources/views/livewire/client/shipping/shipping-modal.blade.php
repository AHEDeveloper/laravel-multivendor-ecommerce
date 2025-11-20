<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ثبت آدرس</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit="submitAddress(Object.fromEntries(new FormData($event.target)))">
                    <div class="row g-4">

                        <div class="col-12">
                            <div class="comment-item">
                                <input type="text" class="form-control" name="address" wire:model="address" id="floatingInputStreet" placeholder="ادرس خود را وارد کنید ...">
                                <label for="floatingInputStreet" class="form-label label-float fw-bold">آدرس
                                    خیابان</label>
                            </div>
                            @error('address')
                            <div wire:loading.remove
                                 class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                                 role="alert">
                                <button type="button" class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <svg> ...</svg>
                                </button>
                                <strong>خطا!! </strong> {{ $message }}</button>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="comment-item">
                                <label for="floatingInputOstan" class="label-float fw-bold">استان <span class="text-danger">*</span></label>
                                <select name="state" wire:model="state" id="floatingInputOstan" wire:change="getCity($event.target.value)" class="form-select">
                                   @foreach($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            @error('state')
                            <div wire:loading.remove
                                 class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                                 role="alert">
                                <button type="button" class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <svg> ...</svg>
                                </button>
                                <strong>خطا!! </strong> {{ $message }}</button>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="comment-item">
                                <label class="label-float fw-bold" for="floatingInputCity">شهر<span
                                        class="text-danger">*</span></label>

                                <select name="city" wire:model="city" id="floatingInputCity" class="form-select">
                                   @foreach($citys as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                   @endforeach
                                </select>

                            </div>
                            @error('city')
                            <div wire:loading.remove
                                 class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                                 role="alert">
                                <button type="button" class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <svg> ...</svg>
                                </button>
                                <strong>خطا!! </strong> {{ $message }}</button>
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="comment-item">
                                <input name="mobile" wire:model="mobile" type="text" class="form-control" id="floatingInputTel" placeholder="شماره تلفن خود را وارد کنید ...">

                                <label for="floatingInputTel" class="form-label label-float fw-bold">شماره
                                    تلفن</label>
                            </div>
                            @error('mobile')
                            <div wire:loading.remove
                                 class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                                 role="alert">
                                <button type="button" class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <svg> ...</svg>
                                </button>
                                <strong>خطا!! </strong> {{ $message }}</button>
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="comment-item">
                                <input name="postal_code" wire:model="postal_code" type="text" class="form-control" id="floatingInputTel" placeholder="شماره پست خود را وارد کنید ...">

                                <label for="floatingInputTel" class="form-label label-float fw-bold">شماره
                                    پست</label>
                            </div>
                            @error('postal_code')
                            <div wire:loading.remove
                                 class="alert alert-light-danger alert-dismissible fade show border-0 mb-4"
                                 role="alert">
                                <button type="button" class="btn-close"
                                        data-bs-dismiss="alert"
                                        aria-label="Close">
                                    <svg> ...</svg>
                                </button>
                                <strong>خطا!! </strong> {{ $message }}</button>
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn main-color-one-bg border-0">
                                    ثبت آدرس
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
