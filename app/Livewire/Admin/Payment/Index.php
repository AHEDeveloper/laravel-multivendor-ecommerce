<?php

namespace App\Livewire\Admin\Payment;

use App\Models\PaymentMethod;
use App\Repositories\admin\PaymentAdminRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $name;
    public $merchent_id;
    public $paymentId;

    private $repository;
    public function boot(PaymentAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function submit($formData) 
    {
        $validate = Validator::make($formData,
            [
                'name' => 'required|string',
                'merchent_id' => 'required|string'
            ],
            [
                '*.required' => 'لطفا فیلد را پر کنید!!',
                '*.string' => 'لطفا از کارکتر ها اسفاده کنید!!'
            ]
        );
        $validate->validate();
        $this->repository->submit($formData,$this->paymentId);
        $this->dispatch('success','عملیات انجام شد');
    }

    public function edit($payment_id)
    {
        $payment = PaymentMethod::query()->where('id',$payment_id)->first();
        if($payment)
        {
            $this->name = $payment->name;
            $this->merchent_id = $payment->merchent_id;
            $this->paymentId = $payment->id;
        }
    }

    public function delete($payment_id)
    {
        $payment = PaymentMethod::query()->where('id',$payment_id)->first();
        if($payment)
        {
            $payment->delete();
        }
        $this->dispatch('success','عملیات حذف انجام شد');
    }

    public function render()
    {
        $payments = PaymentMethod::query()->paginate(10);
        return view('livewire.admin.payment.index', [
            'payments' => $payments
        ])->layout('layouts.admin.app');
    }
}
