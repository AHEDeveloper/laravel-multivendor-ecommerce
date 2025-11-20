<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>

    {!! SEO::generate() !!}

    @include('layouts.client.links')
</head>
<body>

<header class="header">
    <livewire:client.header.index>
</header>



<livewire:client.mega-menu.index>

<main>
    {{$slot}}
</main>

    <livewire:client.mobile-menu.index>


    <livewire:client.footer.index>

<livewire:client.cart-drawer.index>


{{--<div class="float-btn fw-light fw-bolder py-0">--}}
{{--    <div class="container-fluid">--}}
{{--        <!-- go to top -->--}}
{{--        <div class="progress-wrap">--}}
{{--            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">--}}
{{--                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>--}}
{{--            </svg>--}}
{{--        </div>--}}
{{--        <!-- end go to top -->--}}

{{--        <!-- contact us floating -->--}}
{{--        <div id="btncollapzion" class="btn_collapzion"></div>--}}
{{--        <div class="" id="contactOverlay"></div>--}}
{{--        <!-- end contact us floating -->--}}
{{--    </div>--}}
{{--</div>--}}

<livewire:client.mobile-menu.index

@include('layouts.client.scripts')
</body>
</html>
