<?php

namespace App\Livewire\Admin\City;

use App\Models\City;
use App\Models\State;
use App\Repositories\admin\Country_State_CityRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $states = [];
    public $name;
    public $stateId;
    public $cityId =0;

    private $repository;
    public function boot(Country_State_CityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount()
    {
        $this->cityId = 0;
        $this->states = State::all();
    }

    public function submit($formData)
    {
        $validator = Validator::make($formData,[
            'name' => 'required|string|min:5'
        ],[
            'name.required' => 'نام شما خالی است',
            'name.string' => 'از حروف استفاده کنید',
            'name.min' => 'حروف کمتر از5 کاراکتر'
        ]);
        $this->reset('name');
        $validator->validate();
        $this->repository->submitCity($formData,$this->cityId);
        // $this->reset();
        $this->dispatch('success','عملیات با موفقیت انجام شد');
    }

    public function edit($city_id)
    {
        $city = City::query()->where('id',$city_id)->first();
        if($city)
        {
            $this->name  =$city->name;
            $this->stateId = $city->state_id;
            $this->cityId = $city->id;
        }

    }

    public function delete($city_id)
    {
        City::query()->where('id',$city_id)->delete();
        $this->dispatch('success','عملیات حذف انجام شد');

    }

    public function render()
    {
        $citys = City::query()->paginate(10);
        return view('livewire.admin.city.index',['citys' => $citys])->layout('layouts.admin.app');
    }
}
