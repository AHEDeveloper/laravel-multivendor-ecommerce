<?php

namespace App\Repositories\admin;

interface PaymentAdminRepositoryInterface
{
    public function submit($formData,$paymentId);
}
