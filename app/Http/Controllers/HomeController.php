<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marche;

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
        return view('home')->with('marches',$marches);
    }
}
