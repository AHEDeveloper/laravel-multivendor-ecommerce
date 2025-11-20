<div class="statebox widget box box-shadow">

    <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
        @foreach ($features as $index => $feature)
            <div class="row">

                <div class="col-md-2">
                    <h6>{{ $feature->name }}</h6>
                </div>

                <div class="col-md-6">

                    <select class="form-select mb-3" id="value" name="featureValueId[{{ $loop->index }}]">
                        @foreach ($feature->categoryFeatureValue as $value)
                            <option value="{{ $feature->id }}_{{ @$value->id }}">
                                {{ @$value->value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endforeach

        @error('featureValueId.*')
        <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert"
             wire:loading.remove>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <svg> ...</svg>
            </button>
            <strong>خطا !</strong> {{$message}}.</button>
        </div>
        @enderror

        <div class="col-sm-12 text-left">
            <button class="btn btn-success _effect--ripple waves-effect waves-light">
                <span wire:loading.remove>ذخیره کردن</span>
                <div wire:loading class="spinner-border text-white me-2 align-self-center loader-sm "></div>
            </button>
        </div>
    </form>
</div>
