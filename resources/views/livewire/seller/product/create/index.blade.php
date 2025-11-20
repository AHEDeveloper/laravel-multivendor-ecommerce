<div class="row mb-4 layout-spacing layout-top-spacing">
)
    <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))" class="row">

        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

            @include('livewire.seller.product.create.name-seo-items')
            @include('livewire.seller.product.create.image-gallery')
            @include('livewire.seller.product.create.video')


        </div>

        <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <div class="row">

                @include('livewire.seller.product.create.price-category-seller')
                @include('livewire.seller.product.create.discount')

            </div>
        </div>

    </form>

</div>
