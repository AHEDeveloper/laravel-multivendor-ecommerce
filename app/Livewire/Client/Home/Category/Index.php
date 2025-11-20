<?php

namespace App\Livewire\Client\Home\Category;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
//    public $categorys = [];
//
//    public function mount()
//    {
//        $this->categorys = Category::query()->where('category_id','=','1')->limit(8)->get();
//    }

    public function render()
    {
        $categorys = Category::query()->where('category_id','!=',null)->limit(8)->get();
//        dd($categorys);
        return view('livewire.client.home.category.index',
        [
            'categorys' => $categorys
        ]);
    }
}
