<?php

namespace App\Repositories\admin;

use App\Models\City;
use App\Models\Country;
use App\Models\State;

class Country_State_CityRepository implements Country_State_CityRepositoryInterface
{
    public function submitCountry($formData,$countryId)
    {
        Country::query()->updateOrCreate(
            [
                'id' => $countryId
            ]
            ,
            [
                'name' => $formData['name']
            ]
        );
    }

    public function submitState($formData, $stateId)
    {
        State::query()->updateOrCreate(
            [
                'id' => $stateId
            ],
            [
                'name' => $formData['name'],
                'country_id' => $formData['countryId']
            ]
        );
    }

    public function submitCity($formData,$cityId)
    {
        City::query()->updateOrCreate(
            [
                'id' => $cityId
            ]
            ,
            [
                'name' => $formData['name'],
                'state_id' => $formData['stateId']
            ]
        );
    }
}
