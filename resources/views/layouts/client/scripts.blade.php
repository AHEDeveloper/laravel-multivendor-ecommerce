<script src="/client/assets/js/modernizr-3.11.2.min.js"></script>
<script src="/client/assets/js/jquery-3.7.1.min.js"></script>
<script src="/client/assets/js/bootstrap.bundle.min.js"></script>
<script src="/client/assets/plugin/swiper/swiper-bundle.min.js"></script>
<script src="/client/assets/plugin/timer/timer.js"></script>
<script src="/client/assets/plugin/go-to-top/script.js"></script>
<script src="/client/assets/plugin/rasta-contact/script.js"></script>
<script src="/client/assets/js/swiperInit.js"></script>
<script src="/client/assets/js/megaMenu.js"></script>
<script src="/client/assets/js/app.js"></script>
@stack('jsOtp')
@stack('jsProduct')
@stack('jsSingleProduct')
@stack('jsVideo')
@stack('jsTab')
@stack('jsCart')

<!-- initial config contact button  -->
<script>
    $('#btncollapzion').Collapzion({
        _child_attribute: [{
            'label': 'پشتیبانی تلفنی',
            'url': 'tel:0930555555555',
            'icon': 'bi bi-telephone'
        },
            {
                'label': 'پشتیبانی تلگرام',
                'url': 'https://tlgrm.me',
                'icon': 'bi bi-telegram'
            },
            {
                'label': 'پشتیبانی واتس آپ',
                'url': 'https://wa.me/444444444',
                'icon': 'bi-whatsapp'
            },
        ],
    });

    stories()
</script>
