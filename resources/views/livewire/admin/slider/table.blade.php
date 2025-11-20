<div class="col-md-8">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>لیست اسلایدر ها</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">عنوان</th>
                        <th scope="col" class="text-center">تصویر  </th>
                        <th class="text-center" scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($sliders as $slider)

                        <tr>
                            <td>
                                {{ $loop->index +1 }}
                            </td>

                            <td>
                                <div class="media">
                                    <div class="media-body align-self-center">
                                        <h6 class="mb-0">{{ $slider->name }}</h6>
                                    </div>
                                </div>
                            </td>

                            <td class="text-center">
                                <img src="/banner/{{$slider->image}}" width="100" height="50" alt="">
                            </td>



                            <td>
                                <div class="text-center action-btns">
                                    <a href="javascript:void(0);" wire:confirm="آیا مطمئن هستید؟"
                                       wire:click="delete({{ $slider->id }})"
                                       class="action-btn btn-delete bs-tooltip" data-toggle="tooltip"
                                       data-placement="top" title="" data-bs-original-title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-trash-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17">
                                            </line>
                                            <line x1="14" y1="11" x2="14" y2="17">
                                            </line>
                                        </svg>
                                    </a>
                                    <div class="form-check form-check-primary form-check-inline ms-3">
                                        <input wire:change="changeStatus({{$slider->id}})"
                                               {{$slider->status?'checked': ''}}
                                               class="form-check-input" type="checkbox" id="form-check-default">
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>

