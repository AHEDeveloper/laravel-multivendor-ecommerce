<div x-intersect="initializeHomeSlider">
    <section class="main-slider">
        <div class="container-fluid position-relative">
            <!-- Adding a heading for SEO purposes, but hiding it visually -->
            <h2 class="section-title visually-hidden">اسلایدر</h2> <!-- Hidden from view but present for SEO -->

            <div class="slider">
                <div class="swiper" id="homeSlider">
                    <div class="swiper-wrapper">
                    @foreach($sliders as $slider)
                            <div class="swiper-slide">
                                <a href="{{$slider->link}}">
                                    <img src="banner/{{$slider->image}}" class="img-fluid w-100" alt="">
                                </a>
                            </div>
                    @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>
</div>
