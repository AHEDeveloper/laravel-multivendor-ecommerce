@push('linkBlog')
    <link rel="stylesheet" href="/admin/src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="/admin/src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/src/tagify/tagify.css">

    <link rel="stylesheet" type="text/css" href="/admin/src/assets/css/light/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/css/light/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/css/light/tagify/custom-tagify.css">
    <link href="/admin/src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="/admin/src/assets/css/dark/forms/switches.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/css/dark/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="/admin/src/plugins/css/dark/tagify/custom-tagify.css">
    <link href="/admin/src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="/admin/src/assets/css/light/apps/blog-create.css">
    <link rel="stylesheet" href="/admin/src/assets/css/dark/apps/blog-create.css">
    <!--  END CUSTOM STYLE FILE  -->
@endpush
<div class="row mb-4 layout-spacing layout-top-spacing">

    <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            @include('livewire.admin.blog.form')
            @include('livewire.admin.blog.seo')

        </div>

    </form>

</div>
<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    document.addEventListener('livewire:init', () => {
        const editor = CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{route('admin.blog.ck-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            contentsLangDirection: 'rtl',
            height: 500,
        })
        editor.on('change', function (event) {
            console.log(event.editor.getData());
        @this.set('longDescription', event.editor.getData())
        })
    })
</script>

