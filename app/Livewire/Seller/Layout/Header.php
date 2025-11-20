<?php

namespace App\Livewire\Seller\Layout;

use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        return view('livewire.seller.layout.header')->layout('layouts.seller.app');
    }
}
