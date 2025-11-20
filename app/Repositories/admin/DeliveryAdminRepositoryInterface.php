<?php

namespace App\Repositories\admin;

interface DeliveryAdminRepositoryInterface
{
    public function submit($formData,$deliveryId);

}
