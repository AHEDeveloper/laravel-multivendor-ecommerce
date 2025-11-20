<div x-intersect="initializeStorySwiper">
    <!--============ start section story ==============-->
    <section class="story-section" >
        <div class="container-fluid pt-4">

            <!-- Adding a heading for SEO purposes, but hiding it visually -->
            <h2 class="section-title visually-hidden">استوری‌ها</h2> <!-- Hidden from view but present for SEO -->

            <div class="swiper my-unique-free-mode" wire:ignore>
                <div class="swiper-wrapper">

                    @foreach($storys as $story)
                        <div class="swiper-slide mx-3 pointer storiesList-slide showStoryBtn" data-bs-toggle="modal"
                             data-bs-target="#storyModal" data-story="stories/story/{{$story->story}}" wire:ignore.self>
                            <div class="stories-Swiper-item d-flex flex-column align-items-center">
                                <div class="stories-Swiper-item-imgContainer position-relative d-flex justify-content-center align-items-center radius-circle">
                                    <div class="bg-white overflow-hidden radius-circle d-flex">
                                        <div class="radius-circle overflow-hidden d-flex">
                                            <img class="object-fit-cover" src="stories/thumbnail/{{$story->thumbnail}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <span class="mt-2 text-subtitle color-gray-800 text-truncate-2 text-center">{{$story->name}}</span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <!-- Modal Show Story-->
    <div class="modal fade" id="storyModal"  tabindex="-1" role="dialog" aria-labelledby="storyModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="storyModalLabel">نمایش استوری</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" >
                    <video controls class="img-fluid" style="height: 70vh;width: 100%" id="videoStory" preload="none" wire:ignore.self>

                    </video>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> بستن</button>
                </div>
            </div>
        </div>
    </div>

    <!--============ end section story ==============-->
</div>



