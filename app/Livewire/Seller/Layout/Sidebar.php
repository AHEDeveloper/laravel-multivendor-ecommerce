<?php

namespace App\Livewire\Seller\Layout;

use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        return view('livewire.seller.layout.sidebar')->layout('layouts.seller.app');
    }
}
