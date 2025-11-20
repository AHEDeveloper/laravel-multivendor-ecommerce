<div class="statbox widget box box-shadow">

    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>محتوا برای محصول:
                    {{ $productName }}
                </h4>
            </div>
        </div>
    </div>

    <div class="widget-content widget-content-area">
        <form wire:submit="submit(Object.fromEntries(new FormData($event.target)))">
            <div class="row mb-4">
                <label for="short_description" class="form-label">معرفی محصول</label>
                <div class="col-sm-12">

                    <textarea class="form-control" name="short_description" wire:model='shortDescription' id="short_description" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="row mb-4">
                <label for="long_description" class="form-label">معرفی تخصصی</label>
                <div class="col-sm-12" >
                    <textarea class="form-control" wire:model='longDescription' name="long_description"
                              id="editor" cols="30" rows="10"></textarea>
                </div>
            </div>

            <div class="text-left">
                <button type="submit" class="btn btn-primary _effect--ripple waves-effect waves-light">ذخیره</button>
            </div>

        </form>

    </div>

    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            const editor=CKEDITOR.replace('editor',{
                filebrowserUploadUrl: "{{route('seller.ck-upload', [$productId,'_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
                contentsLangDirection: 'rtl',
                height: 500,
            })
            editor.on('change',function (event) {
                console.log(event.editor.getData());
            @this.set('longDescription',event.editor.getData())
            })
        })
    </script>
</div>
