<?php

namespace App\Livewire\Seller\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.seller.dashboard.index')->layout('layouts.seller.app');
    }
}
