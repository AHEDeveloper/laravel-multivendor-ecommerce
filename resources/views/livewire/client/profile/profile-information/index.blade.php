<div>
    <section class="content my-xl-3 my-5 py-xl-4 py-5">
        <div class="container-fluid">
            <div class="row gy-3">
                <!-- side nav -->
                <livewire:client.profile.card-profile.index>

                <!-- main content -->
                <div class="col-xl-9">
                    <div class="row gy-4 align-items-center">
                        <div class="col-6">
                            <div class="section-title-title">
                                <h2 class="fw-900 h4">پروفایل<span class="with-highlight ms-1">شما</span>
                                </h2>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="card rounded-4 slider-parent">
                            <div class="card-body">
                                <div class="account-settings d-flex align-items-center">
                                    <div class="user-profile d-flex align-items-center">
                                        <div class="user-avatar">
                                            @if(Auth::user()->cover)
                                                <img class="rounded-circle border border-3 border-white shadow-sm"
                                                     src="/avatars/{{\Illuminate\Support\Facades\Auth::id()}}/{{\Illuminate\Support\Facades\Auth::user()->cover->path}}"
                                                     alt="Maxwell Admin"
                                                     style="width: 150px; height: 100px; object-fit: cover;">
                                            @endif
                                        </div>

                                        <div class="ms-3">
                                            <h5 class="user-name font-15">{{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                                            <p class="user-email text-muted font-14">amir@amir.com</p>
                                        </div>
                                    </div>
                                    <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))" class="w-100 ms-4">
                                        <div class="form-group">
                                            <label for="uploadProfile" class="form-label">بارگذاری عکس پروفایل</label>
                                            <input type="file" wire:model.live="photo" class="form-control" id="uploadProfile"><br>
                                            <button type="submit" class="btn btn-lg font-14 fw-bold border no-highlight">ذخیره</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-custom mt-5 slider-parent bg-transparent p-0">
                            <div class="table-responsive shadow-box roundedTable p-0">
                                <table class="table main-table rounded-0">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <h6 class="fw-bold font-15 text-muted ">نام و نام خانوادگی:</h6>
                                            <p class=" mt-2 font-14">{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                                        </td>
                                        <td>
                                            <h6 class="text-muted fw-bold font-15 ">شماره تلفن:</h6>
                                            <p class=" mt-2 font-14">{{\Illuminate\Support\Facades\Auth::user()->mobile}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="fw-bold font-15 text-muted">پست الکترونیک:</h6>
                                            <p class=" mt-2 font-14">{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                                        </td>
                                        <td class="no-border">
                                            <h6 class="fw-bold font-15 text-muted">کد ملی:</h6>
                                            <p class=" mt-2 font-14">61400011133322</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="no-border">
                                            <h6 class="fw-bold font-15  text-muted">آدرس: </h6>
                                            <p class=" mt-2 font-14">خرم آباد شهریار انتهای کوچه</p>
                                        </td>
                                        <td>
                                            <h6 class="fw-bold font-15 text-muted">جنسیت:</h6>
                                            <p class=" mt-2 font-14">-</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
