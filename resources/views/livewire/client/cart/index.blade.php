<div>
    <section class="content">
        <div class="container-fluid">
            <div class="tab-content" id="myTabContent">
                <!-- cart -->
                <div class="tab-pane fade show active" id="cart-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="row gy-4 my-1">
                        @include('livewire.client.cart.item')
                        @include('livewire.client.cart.invoice')
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('jsCart')
    <script src="/client/assets/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- initial counter product for product add to cart section -->
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $("input[name='count']").TouchSpin({--}}
{{--                min: 0,--}}
{{--                max: '1000000000000000',--}}
{{--                buttondown_class: "btn-counter waves-effect waves-light",--}}
{{--                buttonup_class: "btn-counter waves-effect waves-light"--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endpush

