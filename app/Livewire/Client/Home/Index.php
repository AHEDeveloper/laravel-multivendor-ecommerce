<?php

namespace App\Livewire\Client\Home;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        return view('livewire.client.home.index')->layout('layouts.client.client-app');
    }
}
