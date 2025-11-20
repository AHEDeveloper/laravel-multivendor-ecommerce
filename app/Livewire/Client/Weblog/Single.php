<?php

namespace App\Livewire\Client\Weblog;

use App\Models\blog;
use Livewire\Component;

class Single extends Component
{
    public $blog;
    public function mount(blog $id)
    {
        $this->blog = $id;
    }

    public function render()
    {
        $weblogLatest = blog::query()
            ->with('cover')
            ->latest()
            ->select('id','name','created_at')
            ->limit(4)
            ->get();
//        dd($weblogLatest);
        return view('livewire.client.weblog.single',[
            'weblogLatest' => $weblogLatest
        ]);
    }
}
