<?php

namespace App\Livewire\Client\Header;

use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $user;
    public $userCover;
    public function mount()
    {
        if (Auth::user())
        {
            $this->user = \App\Models\User::query()->where('id',Auth::id())
                ->with('cover')
                ->first();

        }
    }

    public function render()
    {
        return view('livewire.client.header.index');
    }
}
