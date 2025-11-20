<?php

namespace App\Repositories\admin\blog;

interface BlogAdminRepositoryInterface
{
    public function submit($formData,$blogId,$photo);
    public function submitBlog($formData,$blogId);
    public function submitImageBlog($photo,$blogId,$blog);
    public function saveImage($photo,$blogId,$blog);
    public function submitSeoItems($formData,$blogId,$blog);






}
