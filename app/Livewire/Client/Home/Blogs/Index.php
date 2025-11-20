<?php

namespace App\Livewire\Client\Home\Blogs;

use App\Models\blog;
use Livewire\Component;

class Index extends Component
{
    public $photo;

    public function render()
    {
        $blogs = blog::query()->get();
        return view('livewire.client.home.blogs.index',[
            'blogs' => $blogs
        ]);
    }
}
