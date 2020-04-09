<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marche;
use App\MarcheFlash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Lien vers la page propre de l'utilisateur
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $marches=Marche::all();
        $marcheFlash=MarcheFlash::all();
        return view('home')->with('marches',$marches)->with('marcheFlashs',$marcheFlash);
    }
}
