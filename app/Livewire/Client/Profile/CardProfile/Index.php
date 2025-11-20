<?php

namespace App\Livewire\Client\Profile\CardProfile;

use Illuminate\Routing\Route;
use Livewire\Component;

class Index extends Component
{
    public $route;
    public function mount()
    {
        $this->route = \Illuminate\Support\Facades\Route::current()->getName();

    }
    public function render()
    {
        return view('livewire.client.profile.card-profile.index');
    }
}
