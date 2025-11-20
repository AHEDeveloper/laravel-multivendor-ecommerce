<?php

namespace App\Livewire\Client\Profile\ProfileInformation;

use App\Models\UserImage;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
use WithFileUploads,UploadFile;

    public $photo;

    public function submit($formData)
    {
        $formData['photo'] = $this->photo;
        $validator = Validator::make($formData,[
            'photo' => 'nullable|image|mimes:png,jpg,jpeg,webp,gif',
        ],[
            'photo.mimes' => '  فرمت نامعتبر است',
            'photo.image' => 'لطفا عکس انتخاب کنید',
        ]);
//        dd($this->photo);
        $validator->validate();
        $this->userImage($this->photo);
        $this->saveimage($this->photo,Auth::id());
    }
    public function userImage($photo)
    {
        if ($photo)
        {
            $path = pathinfo($photo->hashName(),PATHINFO_FILENAME).'.webp';
            UserImage::query()->where('user_id',Auth::id())->delete();

            UserImage::query()->create(
                [
                    'path' => $path,
                    'user_id' => Auth::id()
                ]
            );
        }
    }

    public function saveimage($photo,$userId)
    {
        File::deleteDirectory('avatars/'.$userId);
        $this->uploadImageInWebFormatUser($photo,$userId,400,400);

    }

    public function render()
    {
        return view('livewire.client.profile.profile-information.index');
    }
}
