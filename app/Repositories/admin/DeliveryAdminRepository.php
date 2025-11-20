<?php

namespace App\Repositories\admin;

use App\Models\DeliveryMethod;

class DeliveryAdminRepository implements DeliveryAdminRepositoryInterface
{
    public function submit($formData, $deliveryId)
    {
        DeliveryMethod::query()->updateOrCreate(
            [
                'id' => $deliveryId
            ],
            [
                'name' => $formData['name'],
                'price' => $formData['price']
            ]
        );
    }
}
