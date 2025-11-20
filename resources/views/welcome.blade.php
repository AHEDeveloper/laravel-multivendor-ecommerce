<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CKEditor 5 با Livewire</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</head>
<body>

<h1>ویرایشگر متن با CKEditor 5 و Livewire</h1>

<textarea name="longDescription" id="editor" cols="30" rows="10">
    اینجا متن خود را وارد کنید...
</textarea>

<script>
    document.addEventListener('livewire:init', () => {
        ClassicEditor
            .create(document.querySelector('#editor'), {
                // تنظیمات آپلود فایل
                simpleUpload: {
                    uploadUrl: "{{ route('admin.ck-upload', [$productId]) }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                },
                // راست‌چین کردن محتوا
                language: 'fa',
                // ارتفاع ویرایشگر
                height: 500,
            })
            .then(editor => {
                console.log('ویرایشگر آماده است!', editor);

                // تنظیم راست‌چین برای محتوای قابل ویرایش
                editor.editing.view.change(writer => {
                    writer.setAttribute('dir', 'rtl', editor.editing.view.document.getRoot());
                });

                // ارسال مقدار به Livewire هنگام تغییر محتوا
                editor.model.document.on('change:data', () => {
                @this.set('longDescription', editor.getData());
                });
            })
            .catch(error => {
                console.error('خطا در ساخت ویرایشگر:', error);
            });
    });
</script>

<style>
    /* راست‌چین کردن ناحیه قابل ویرایش */
    .ck-editor__editable {
        direction: rtl;
        text-align: right;
        min-height: 500px; /* ارتفاع حداقل */
    }
</style>

</body>
</html>
