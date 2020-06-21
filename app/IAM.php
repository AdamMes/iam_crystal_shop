<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Curl;

class IAM extends Model
{
    static public function getCountries()
    {
        return Curl::to('https://restcountries.eu/rest/v2/all')
            ->asJson()
            ->get();
    }
}