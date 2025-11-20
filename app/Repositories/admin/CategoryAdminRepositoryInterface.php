<?php

namespace App\Repositories\admin;

interface CategoryAdminRepositoryInterface
{
    public function submit($formData, $categoryId,$photo);

    public function submitCategoryFeature($formData, $categoryId, $featureId);

    public function submitCategoryFeatureValue($formData,$valueId,$featureId);




}
