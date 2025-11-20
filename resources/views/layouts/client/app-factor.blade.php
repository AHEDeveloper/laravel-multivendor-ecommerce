<!DOCTYPE html>
<html dir="rtl" lang="">
<head>
    <title>قالب آبتین</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/client/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/client/assets/css/style.css">
    <link rel="stylesheet" href="/client/assets/css/responsive.css">
</head>
<body class="bg-white">

{{$slot}}


<script src="/client/assets/js/jquery-3.7.1.min.js"></script>
<script src="/client/assets/js/bootstrap.bundle.min.js"></script>
<script src="/client/assets/js/app.js"></script>
<script src="/client/assets/js/modernizr-3.11.2.min.js"></script>

<script>
    function printInvoice() {
        window.print();
    }
</script>

</body>
</html>
