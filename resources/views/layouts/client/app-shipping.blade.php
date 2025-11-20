<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8">
    <title>قالب آبتین</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

@include('layouts.client.links')

</head>
<body>

<!--============ start main content ==============-->

<section class="content mb-5 pb-xl-0 pb-5">
    <div class="container-fluid">
        <div class="content-box">
            <!-- shipping title -->
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <a href="{{route('client.cart.index')}}" class="me-2"><i class="bi bi-arrow-right-short fs-2"></i></a>
                        <h5 class="h5">آدرس و زمان ارسال</h5>
                    </div>
                </div>
                <div class="col-6">
                    <div class="top-header-logo text-lg-start text-end">
                        <a href="{{route('client.home.index')}}">
                            <img src="{{asset('client/assets/image/logo.png')}}" width="120" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- shipping meta -->
        {{$slot}}
    </div>
</section>



@include('layouts.client.scripts')


<script>
    const timeDisplay = document.querySelector('#showTime');
    const timeDisplayPrice = document.querySelector('#showTimePrice');
    const timeInputs = document.querySelectorAll('input[type="radio"]');


    // Time selection logic
    timeInputs.forEach(input => {
        input.addEventListener('change', () => {
            timeDisplay.textContent = input.value;
            timeDisplayPrice.textContent = input.getAttribute('data-price');
        });
    });
</script>

</body>
</html>
