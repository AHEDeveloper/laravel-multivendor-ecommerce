<div>
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <div id="blog-list_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="dt--top-section">
                        <div class="row">
                            <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                <div class="dataTables_length" id="blog-list_length">
                                    <label>Results :
                                        <select name="blog-list_length" wire:model.live.debounce.300ms="result" aria-controls="blog-list" class="form-control">
                                            <option value="2">2</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div
                                class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                <div id="blog-list_filter" class="dataTables_filter"><label>

                                        <input type="search" class="form-control" wire:model.live.debounce.300ms="search" placeholder="Search..."
                                               aria-controls="blog-list"></label></div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <table id="blog-list" class="table dt-table-hover dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="blog-list_info">
                            <thead>
                            <tr role="row">
                                <th class="checkbox-column sorting_asc" rowspan="1" colspan="1" aria-label=""
                                    style="width: 21px;">
                                    <div class="form-check form-check-primary d-block new-control">
                                      <span>ردیف</span>
                                    </div>
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="blog-list" rowspan="1" colspan="1"
                                    aria-label="Posts: activate to sort column ascending" style="width: 438px;">Posts
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="blog-list" rowspan="1" colspan="1"
                                    aria-label="Date: activate to sort column ascending" style="width: 77px;">Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="blog-list" rowspan="1" colspan="1"
                                    aria-label="Status: activate to sort column ascending" style="width: 121px;">Status
                                </th>
                                <th class="no-content text-center sorting" tabindex="0" aria-controls="blog-list"
                                    rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"
                                    style="width: 48px;">Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                        @foreach($blogs as $blog)
                                            <tr role="row">
                                                <td class="sorting_1">
                                                    <div class="form-check form-check-primary d-block new-control">
                                                        <span>{{$loop->index +1}}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar  me-3">
                                                            @if($blog->cover->path)
                                                                <img src="/blog/{{ $blog->id }}/medium/{{ $blog->cover->path }}" alt="Avatar" width="100" height="100">
                                                            @endif
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <span class="text-truncate fw-bold">{{$blog->name}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$blog->created_at}}</td>
                                                <td><span>{{$blog->StudyTime}}</span></td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink20"
                                                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="feather feather-more-horizontal">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="19" cy="12" r="1"></circle>
                                                                <circle cx="5" cy="12" r="1"></circle>
                                                            </svg>
                                                        </a>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink20">
                                                            <a class="dropdown-item" href="{{route('admin.blog.index')}}?id={{$blog->id}}&result={{$this->result}}">Edit</a>
                                                            <a class="dropdown-item" wire:click="deleteBlog({{$blog->id}})" wire:confirm="شما از حذف اطمینان دارید؟">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                            </tbody>
                        </table>
                        {{ $blogs->links('layouts.admin.pagination') }}
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

