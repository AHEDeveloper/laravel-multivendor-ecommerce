<?php

namespace App\Livewire\Admin\Country;

use App\Models\Country;
use App\Repositories\admin\Country_State_CityRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $name;
    public $countryId;

    private $repository;
    public function boot(Country_State_CityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function submit($formData)
    {
        $validator = Validator::make($formData, [
            'name' => 'required | string | max:30'
        ], [
            '*.required' => 'نام خالی است',
            '*.string' => 'از حروف استفاده کنید',
            '*.max' => 'حروف بیش از 30 تا هست!!'
        ]);
        $validator->validate();
        $this->repository->submitCountry($formData, $this->countryId);
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد');

        // if ($country->wasRecentlyCreated) {
        //     session()->flash('succsee', 'تسک با موفقیت ایجاد شد.');
        // } else {
        //     session()->flash('succsee', 'تسک با موفقیت بروزرسانی شد.');
        // }
    }

    public function edit($country_id)
    {
        $country = Country::query()->where('id', $country_id)->first();
        if ($country) {
            $this->name = $country->name;
            $this->countryId = $country->id;
        }
    }

    public function delete($country_id)
    {
        Country::query()->where('id', $country_id)->delete();
        $this->dispatch('success', 'عملیات حذف انجام شد');
    }

    public function render()
    {
        $countrys = Country::query()->paginate(10);
        return view('livewire.admin.country.index', ['countrys' => $countrys])->layout('layouts.admin.app');
    }
}
