<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8">
    <title>قالب آبتین</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/client/assets/css/style.css">
    <link rel="stylesheet" href="/client/assets/css/responsive.css">

</head>
<body>

<!--============ start main content ==============-->

<section class="content mb-5 pb-xl-0 pb-5">
    <div class="container-fluid mt-5 pt-5">
       {{$slot}}
    </div>
</section>

@include('layouts.client.scripts')

</body>
</html>
