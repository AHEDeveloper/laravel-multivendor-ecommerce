<?php

namespace App\Repositories\admin;

interface Country_State_CityRepositoryInterface
{
    public function submitCountry($formData,$countryId);

    public function submitState($formData, $stateId);

    public function submitCity($formData,$cityId);

}
