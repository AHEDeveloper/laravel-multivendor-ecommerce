<?php

namespace App\Livewire\Client\Home\Story;

use App\Models\Story;
use Livewire\Component;

class Index extends Component
{
    public $storys = [];
    public function mount()
    {
        $this->storys = Story::query()->where('status',true)->get();
    }

    public function placeholder()
    {
        return view('layouts.client.placeholder.skeleton-story');
    }
    public function render()
    {
        return view('livewire.client.home.story.index');
    }
}
