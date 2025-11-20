<?php

namespace App\Repositories\admin;

use App\Models\PaymentMethod;

class PaymentAdminRepository implements PaymentAdminRepositoryInterface
{
    public function submit($formData,$paymentId)
    {
        PaymentMethod::query()->updateOrCreate(
            [
                'id' => $paymentId
            ],[
                'name' => $formData['name'],
                'merchent_id' => $formData['merchent_id']
            ]
        );
    }
}
