<?php

namespace App\Livewire\Admin\Blog;


use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Livewire\Component;

class CkUpload extends Component
{
    use UploadFile;
    public function upload(Request $request)
    {
       if ($request->hasFile('upload'))
       {
           $file = $request->file('upload');
           $this->uploadImageWebFormatBlog($file,'content');

           $CKEditorFuncNum = $request->input('CKEditorFuncNum');
           $url = asset('blog/content/'.pathinfo($file->hashName(), PATHINFO_FILENAME) . '.webp');
           $msg = 'Image uploaded successfully';
           $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

           @header('Content-type: text/html; charset=utf-8');
           echo $response;
       }
    }
}
