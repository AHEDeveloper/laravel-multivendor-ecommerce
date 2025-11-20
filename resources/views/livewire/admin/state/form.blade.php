<div class="col-md-4">

    <div class="col-lg-12 col-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>مدریت استانها</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
                    <div class="row mb-4">
                        <div class="col-sm-12">

                            <div class="form-group mb-4">
                                <label for="formGroupExampleInput">ساخت استان</label>
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
                            <label for="country" class="form-label">کشور</label>
                            <select id="country" class="form-control" name="countryId" wire:model="countryId" placeholder="انتخاب کشور" autocomplete="off">
                                @foreach($countrys as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
    
                            </select>
                        </div>
                    </div>
    
                    @error('countryId')
                    <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert"
                         wire:loading.remove>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg> ...</svg>
                        </button>
                        <strong>خطا !</strong> {{$message}}.</button>
                    </div>
                    @enderror
                   

                    <button style="height: 50px" type="submit" class="btn btn-primary _effect--ripple waves-effect waves-light">
                         <span wire:loading.remove >ثبت استان</span>
                        <div wire:loading class="spinner-border text-white me-2 align-self-center loader-sm "></div>
                    </button>
                    {{-- <input type="submit" name="time" class="btn btn-primary"> --}}
                </form>
           
            </div>
        </div>
    </div>

</div>