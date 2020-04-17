<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historique;
use App\Marche;
use App\User;
use Auth;

class HistoriqueController extends Controller
{
    
    public function index()
    {
        $historiques = Historique::where('user_id',"=",Auth::user()->id)->get();
        return view('historique')->with('historiques',$historiques);
    }

    public function store(Request $request)
    {
        $histo=Historique::where('user_id','=',$request->user_id)
        ->where('marche_id','=',$request->marche_id)
        ->exists();
        if($histo)
        {
            return redirect()->back()->with('message', 'La marche est déjà enregistrée');
        }
        else
        {
            $historique=new Historique();
            $marche = Marche::find($request->marche_id);
            $user= User::find($request->user_id);
            $historique->marche()->associate($marche);
            $historique->user()->associate($user);
            $historique->save();
            return redirect()->back()->with('message', 'Marche enregistrée');
        }        
    }

}
