<div class="col-lg-9">
    <a data-bs-toggle="modal" data-bs-target="#editModal" href="javascript:void(0)" wire:click="getState('add')"
       class="btn main-color-one-bg rounded-3 btn-action-panel mb-3"> ثبت آدرس <i class="bi bi-pencil-square ms-2"></i></a>
    <br>
    @foreach($addressLists as $index=>$address)
        <div class="content-box ">
            <div class="d-flex align-items-center action-btn">
                <input  class="form-check-input me-3 wh-20" type="radio" name="payment"
                       wire:click="addressCheck({{$address->id}})">

                <div>
                    <i class="bi bi-geo-alt"></i>
                </div>

                <div class="d-grid gap-3 ms-3">
                    <small class="text-muted font-16">آدرس تحویل سفارش</small>
                    <strong class="font-16">{{$address->address}}</strong>
                    <span class="text-muted font-16">{{$address->user->name}}</span>
                </div>
            </div>
            <div class="text-end">
                <a href="" wire:click="editAddress({{$address->id}})" data-bs-toggle="modal" data-bs-target="#editModal"
                   class="main-color-two-color">
                    تغییر یا ویرایش آدرس
                    <i class="bi bi-chevron-left ms-2 fs-6"></i>
                </a>
            </div>

        </div>
    @endforeach
    @foreach($deliverys as $index=>$delivery)
        <div class="content-box mt-3">
            <div class="d-flex align-items-center">
                <input  class="form-check-input me-3 wh-20" type="radio" name="delivery"
                       wire:click="changeDeliveryPrice({{$delivery->id}})">
                <div>
                    <i class="bi bi-truck fs-2 text-danger"></i>
                </div>
                <div class="d-grid gap-2 ms-3">
                    {{--                    <a href="javascript:void(0)">--}}
                    <strong class="font-16"> {{$delivery->name}}</strong>
                    <h4 class="text-muted font-13">قیمت:{{number_format($delivery->price)}}تومان</h4>
                    {{--                    </a>--}}
                </div>
            </div>
        </div>
    @endforeach
</div>
@include('livewire.client.shipping.shipping-modal')
