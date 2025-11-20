<?php

namespace App\Repositories\admin\blog;

use App\Models\blog;
use App\Models\BlogImage;
use App\Models\SeoItem;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\DB;

class BlogAdminRepository implements BlogAdminRepositoryInterface
{
    use UploadFile;
    public function submit($formData,$blogId,$photo)
    {
        DB::transaction(function () use ($formData,$blogId,$photo) {
            $blog = $this->submitBlog($formData,$blogId);
            $this->submitImageBlog($photo,$blogId,$blog);
            $this->saveImage($photo,$blogId,$blog);
            $this->submitSeoItems($formData,$blogId,$blog);
        });
    }

    public function submitBlog($formData,$blogId)
    {
         return blog::query()->updateOrCreate(
            [
                'id' => $blogId
            ],
            [
                'name' => $formData['name'],
                'StudyTime' => $formData['study_time'],
                'category' => $formData['category'],
                'description' => $formData['description']
            ]
        );
    }

    public function submitImageBlog($photo,$blogId,$blog)
    {
        if ($photo)
        {
            $path = pathinfo($photo->hashName(),PATHINFO_FILENAME). '.webp';
            BlogImage::query()->create(
                [
                    'path' => $path,
                    'blog_id' => $blog->id
                ]
            );
        }
    }

    public function saveImage($photo,$blogId,$blog)
    {
        if ($photo)
        {
            $this->uploadeImageWebformatVeBlog($photo,$blog->id,100,100,'small');
            $this->uploadeImageWebformatVeBlog($photo,$blog->id,300,300,'medium');
            $this->uploadeImageWebformatVeBlog($photo,$blog->id,800,800,'large');
            $photo->delete();
        }
    }

    public function submitSeoItems($formData,$blogId,$blog)
    {
        SeoItem::query()->updateOrCreate(
            [
                'ref_id' => $blogId,
                'type' => 'blog'
            ],
            [
                'slug' => $formData['slug'],
                'meta_title' => $formData['meta_title'],
                'meta_description' => $formData['meta_description'],
                'ref_id' => $blog->id,
                'type' => 'blog'
            ]
        );
    }
}
