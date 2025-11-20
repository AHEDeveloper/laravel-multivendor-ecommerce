<?php

namespace App\Livewire\Admin\Delivery;

use App\Models\DeliveryMethod;
use App\Repositories\admin\DeliveryAdminRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $name;
    public $price;
    public $deliveryId;

    private $repository;

    public function boot(DeliveryAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function submit($formData)
    {
        $validate = Validator::make(
            $formData,
            [
                'name' => 'required | string | ',
                'price' => 'required | numeric | '
            ],
            [
                '*.required' => 'لطفا فیلد را پر کنید!!',
                '*.string' => 'لطفا از کارکتر ها اسفاده کنید!!',
                '*.numeric' => 'لطفا از اعداد استفاده کنید',
                
            ]
        );
        $validate->validate();
        $this->resetValidation();
        $this->reset('name','price');
        $this->repository->submit($formData,$this->deliveryId);
        $this->dispatch('success','عملیات انجام شد');
    }

    public function edit($delivery_id)
    {
        $delivery = DeliveryMethod::query()->where('id',$delivery_id)->first();
        if($delivery)
        {
            $this->name = $delivery->name;
            $this->price = $delivery->price;
            $this->deliveryId = $delivery->id;
        }
    }

    public function delete($delivery_id)
    {
        $delivery = DeliveryMethod::query()->where('id',$delivery_id)->first();
        if($delivery)
        {
            $delivery->delete();
        }
        $this->dispatch('success','عملیات حذف انجام شد');
    }




    public function render()
    {
        $deliverys = DeliveryMethod::query()->paginate(10);
        return view('livewire.admin.delivery.index',['deliverys' => $deliverys])->layout('layouts.admin.app');
    }
}
