<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marche;
use App\Event;
use App\Historique;
use Auth;
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
        // $marches=Marche::all();
        // $events=Event::all();
        // $historiques = Historique::where('user_id',"=",Auth::user()->id)->get();
        // return view('home')->with('marches',$marches)->with('events',$events)->with('historiques',$historiques);
        if(Auth::user()->groupe=='true')
        {
            $events1=Event::where('user_id','!=',Auth::user()->id);
        }
        else
        {
            $events1=Marche::where("user_id","!=",Auth::user()->id)
            ->where('region','LIKE','%'.Auth::user()->region.'%')
            ->where('niveau','LIKE','%'.Auth::user()->region.'%');
        }
        $marches=Marche::where('user_id','=',Auth::user()->id);
        
        $historiques = Historique::where('user_id',"=",Auth::user()->id);
        
        $events2=Event::where('user_id','=',Auth::user()->id);
        
        if($events1->exists())
        {
            if(Auth::user()->groupe=='true')
            {
                $events1=Event::where('user_id','!=',Auth::user()->id)->get();
            }
            else
            {
                $events1=Marche::where("user_id","!=",Auth::user()->id)
                ->where('region','LIKE','%'.Auth::user()->region.'%')
                ->where('niveau','LIKE','%'.Auth::user()->region.'%')->get();
            }
        }
        else
        {
            $events1=[];
        }
        
        if($marches->exists())
        {
            $marches=Marche::where('user_id','=',Auth::user()->id)->get();
        }
        else
        {
            $marches=[];
        }
        
        if($historiques->exists())
        {
            $historiques = Historique::where('user_id',"=",Auth::user()->id)->get();
        }
        else
        {
            $historiques=[];
        }

        if($events2->exists())
        {
        $events2=Event::where('user_id','=',Auth::user()->id)->get();
        }
        else
        {
            $events2=[];
        }

        return view('home')->with('events1',$events1)->with('marches',$marches)->with('events2',$events2)->with('historiques',$historiques);
    }
}
