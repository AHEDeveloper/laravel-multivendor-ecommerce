<?php

namespace App\Livewire\Client\Weblog;

use App\Models\blog;
use Livewire\Component;

class Index extends Component
{
    public $search;

//    public function mount()
//    {
//        dd($this->search);
//    }

    public function render()
    {

        $weblogs = blog::query()
            ->when($this->search,function ($query){
                $query->where('name','like','%'.$this->search.'%');
            })
            ->get();
        return view('livewire.client.weblog.index',[
            'weblogs' => $weblogs
        ]);
    }
}
