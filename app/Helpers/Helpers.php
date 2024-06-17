<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

function hello()
{
    return "Hello World";
}

if (!function_exists("getCountyNameUsingId")) {
    function getCountyNameUsingId($id)
    {
        if ($id != "0") {
            $country = DB::table('countries')->where("id", $id)->first();
        }
        return $id == "0" ? "Any" : ucfirst($country->name);
    }
}

if (!function_exists("getStateNameUsingId")) {
    function getStateNameUsingId($id)
    {
        if ($id != "0") {
            $state = DB::table('states')->where("id", $id)->first();
        }
        return $id == "0" ? "Any" : ucfirst($state->name);
    }
}

if (!function_exists("getCityNameUsingId")) {
    function getCityNameUsingId($id)
    {
        if ($id != "0") {
            $city = DB::table('cities')->where("id", $id)->first();
        }
        return $id == "0" ? "Any" : ucfirst($city->name);
    }
}
