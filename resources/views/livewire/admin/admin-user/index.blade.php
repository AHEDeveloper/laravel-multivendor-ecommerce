<div class="row">

    @if(session()->has('message'))
        <div class="alert alert-success fs-2">
            {{session('message')}}
        </div>
    @endif

    @include('livewire.admin.admin-user.form')

    @include('livewire.admin.admin-user.table')

</div>
