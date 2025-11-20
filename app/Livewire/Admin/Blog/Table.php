<?php

namespace App\Livewire\Admin\Blog;

use App\Models\blog;
use App\Models\BlogImage;
use App\Models\SeoItem;
use http\Env\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public $result = 2;
    public $search;

    protected $queryString = [
      'result'
    ];

    public function mount()
    {
        if (session()->get('result'))
        {
            $this->result = intval(session()->get('result'));
        }
    }

    public function deleteBlog($blog_id)
    {
        $blog = blog::query()->where('id',$blog_id)->first();
        if ($blog)
        {
            SeoItem::query()->where('ref_id',$blog->id)->delete();
            BlogImage::query()->where('blog_id',$blog->id)->delete();

            $blog->delete();
        }
    }

    public function render()
    {
        $blogs = blog::query()
            ->with('cover')
            ->when($this->search,function ($query){
                $query->where('name','like','%'.$this->search.'%');
            })
            ->limit($this->result)
            ->paginate($this->result);
//        dd($blogs);
        return view('livewire.admin.blog.table',[
            'blogs' => $blogs
        ])->layout('layouts.admin.app');
    }
}
