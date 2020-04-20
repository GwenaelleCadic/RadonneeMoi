<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Region;
class CountryController extends Controller
{
    //Afficher l'inscription en envoyant les pays
    public function index(){
        $countries=Country::all();
        return view('auth.register')->with("countries",$countries);
    }

    //Récupération des régions associées au pays dont l'id est passé en entrée
    public function getStates($id){
        $states=Region::where('country_id',$id)->get();
        return $states;
    }
}
