<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Region;
class CountryController extends Controller
{
    public function index(){
        $countries=Country::all();
        return view('auth.register')->with("countries",$countries);
    }

    public function getStates($id){
        $states=Region::where('country_id',$id)->get();
        return $states;
        //return json_encode($states);
    }
}
