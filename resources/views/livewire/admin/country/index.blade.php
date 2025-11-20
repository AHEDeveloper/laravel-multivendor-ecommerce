<div class="row">
    <div class="col-md-4">
        <div class="col-lg-12 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>مدریت کشورها</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">

                        <div class="form-group mb-4">
                            <label for="formGroupExampleInput">ساخت کشور</label>
                            <input type="text" class="form-control" name="name" wire:model='name' id="formGroupExampleInput">
                        </div>

                        <button style="height: 50px" type="submit" class="btn btn-primary _effect--ripple waves-effect waves-light">
                             <span wire:loading.remove >ثبت کشور</span>
                            <div wire:loading class="spinner-border text-white me-2 align-self-center loader-sm "></div>
                        </button>
                        {{-- <input type="submit" name="time" class="btn btn-primary"> --}}
                    </form>
                    @error('name')
                    <div wire:loading.remove class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert" >
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!! </strong> {{ $message }}</button>
                    </div> 
                    @enderror
             
        
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div id="tableCustomBasic" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>جدول مدیریت کشورها</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">نام کشور</th>
                                    <th class="text-center" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countrys as $country)
                                <tr>
                                    <td>
                                        {{ $loop->iteration + $countrys->firstItem() -1 }}
                                    </td> 
                                    <td>
                                        <div class="media">
                                           
                                            <div class="media-body align-self-center">
                                                <h6 class="mb-0">{{ $country->name }}</h6>
                                                
                                            </div>
                                        </div>
                                    </td>                           
                                    <td class="text-center">
                                        <div class="action-btns">
                                           
                                            <a href="javascript:void(0);" wire:click='edit({{ $country->id }})' class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                            </a>
                                            <a href="javascript:void(0);" wire:click='delete({{ $country->id }})' wire:confirm='شما از حذف اطمینان دارید؟' class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $countrys->links('layouts.admin.pagination') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
