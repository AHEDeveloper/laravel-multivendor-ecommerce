<?php

namespace App\Livewire\Admin\State;

use App\Models\Country;
use App\Models\State;
use App\Repositories\admin\Country_State_CityRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $countrys = [];
    public $stateId;
    public $name;
    public $countryId;
    public $parentID;

    private $repository;
    public function boot(Country_State_CityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount()
    {

        $this->countrys = Country::all();
    }

    public function submit($formData)
    {
        $validator = Validator::make($formData,[
            'name' => 'required|string'
        ]);
        $validator->validate();
        $this->repository->submitState($formData,$this->stateId);
        // $this->reset();
        $this->dispatch('success','عملیات انجام شد');
    }

    public function edit($state_id)
    {
        $state = State::query()->where('id',$state_id)->first();
        if($state)
        {
            $this->stateId = $state->id;
            $this->name = $state->name;
            $this->countryId = $state->country_id;
        }
    }

    public function delete($state_id)
    {
        State::query()->where('id',$state_id)->delete();
        $this->dispatch('success','عملیات حذف انجام شد');

    }

    public function render()
    {
        $states = State::query()->paginate(10);
        return view('livewire.admin.state.index',['states' => $states])->layout('layouts.admin.app');
    }
}
