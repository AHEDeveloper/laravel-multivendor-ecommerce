<div class="col-md-4">

    <div class="col-lg-12 col-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>مدریت شهرها</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                    <div class="row mb-4">
                        <div class="col-sm-12">

                            <div class="form-group mb-4">
                                <label for="formGroupExampleInput">ساخت شهر</label>
                                <input type="text" class="form-control" name="name" wire:model.live='name' id="formGroupExampleInput">
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
                            <label for="state" class="form-label">استان</label>
                            <select id="state" class="form-control" name="stateId" wire:model="stateId" placeholder="انتخاب استان" autocomplete="off">
                                @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    @error('stateId')
                    <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert"
                         wire:loading.remove>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>
                    @enderror


                    <button style="height: 50px" type="submit" class="btn btn-primary _effect--ripple waves-effect waves-light">
                         <span wire:loading.remove >ثبت شهر</span>
                        <div wire:loading  class="spinner-border text-white me-2 align-self-center loader-sm "></div>
                    </button>
                    {{-- <input type="submit" name="time" class="btn btn-primary"> --}}
                </form>

            </div>
        </div>
    </div>

</div>
