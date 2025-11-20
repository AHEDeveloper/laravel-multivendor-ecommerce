<?php

namespace App\Livewire\Client\Auth;

use App\Models\User;
use App\Models\UserImage;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;

class Index extends Component
{
use UploadFile;

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $gmailUser = Socialite::driver('google')->stateless()->user();
        $this->checkUser($gmailUser);
        return redirect(route('client.home.index'));
    }

    public function checkUser($gmailUser)
    {
        $existingUser = User::query()
            ->where('email',$gmailUser['email'])->first();

        $pictureName = basename($gmailUser->avatar);
        if (!$existingUser)
        {
            $newUser = User::query()->updateOrCreate(
                [
                    'email' => $gmailUser['email']
                ],
                [
                    'name' => $gmailUser['name']
                ]
            );
            $this->userImage($pictureName,$newUser->id);
            $this->saveimage($gmailUser,$newUser->id);
            Auth::login($newUser,true);
        }
        else{
            Auth::login($existingUser,true);
        }

    }

    public function userImage($photo,$userId)
    {
        $path = $photo.'.webp';
        UserImage::query()->create(
            [
                'path' => $path,
                'user_id' => $userId
            ]
        );
    }

    public function saveimage($gmailUser,$userId)
    {
        // دانلود تصویر
        $pictureName = basename($gmailUser->avatar);
        $imageUrl = $gmailUser->avatar;
        $imageContents = file_get_contents($imageUrl);
        $imageName = 'avatars/' . $userId .'/'.$pictureName. '.webp'; // نام تصادفی برای تصویر
        Storage::disk('public')->put($imageName, $imageContents);
    }

    public function loguot()
    {
//        dd('dd');
        Auth::logout();
        return redirect(route('client.auth.index'));
    }

    public function render()
    {
        return view('livewire.client.auth.index')->layout('layouts.client.app-auth');
    }
}
