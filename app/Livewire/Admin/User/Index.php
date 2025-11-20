<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $users = User::query()
            ->withCount('orders')
            ->latest();
        if ($this->search)
        {
            $users->where('email','like','%'.$this->search.'%')
                ->orWhere('mobile','like','%'.$this->search.'%');
        }
        return view('livewire.admin.user.index',[
            'users' => $users->paginate(10)
        ])->layout('layouts.admin.app');
    }
}
