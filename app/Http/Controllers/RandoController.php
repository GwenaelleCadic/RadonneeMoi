<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MarcheRequest;
//use App\Repositories\MarcheRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Repositories\MarcheRepository;
use App\Marche;
use App\User;
class RandoController extends Controller
{
	protected $marcheRepository;
	
	public function __construct(MarcheRepository $marcheRepository)
	{
		$this->marcheRepository = $marcheRepository;
	}


	public function store(Request $request)
	{
		//On ne permet l'enregistrement que si toutes les données sont entrées
		$this->validate($request, [
            'nom'=>'required|max:255',
            'niveau'=>'required|max:30',
			'temps'=>'required',
			'type'=>'required',
			'region'=>'required',
			'denivele'=>'required',
			'distance'=>'required',
			'description' =>'required',
			'user_id'=>'required',
		]);

		//Creation de la Marche à partir des données entrée
		$user=User::find($request->user_id);
		$marche= new Marche;
		
		$marche->nom = $request->input('nom');
		$marche->niveau = $request->input('niveau');
		$marche->region = $request->input('region');
		$marche->description = $request->input('description');
		$marche->denivele= $request->input('denivele');
		$marche->distance= $request->input('distance');
		$marche->temps= $request->input('temps');
		// traitement du type en fonction de la durée de la marche
		if($marche->temps<='04:00')
		{
			$marche->type='dj';
		}
		else
		{
			$marche->type='j';
		}
		$marche->user()-> associate($user);
		$marche->save();

		return view('rando_ok');
	}
	public function index()
	{
		$marche=Marche::all();/*
		$marche=DB::table('marches')->find(1);
		print_r($marche);
		/*echo "I am here";*/
		return view('accueil')->with('marches',$marche);
	}

	public function searchRando(Request $request)
	{
		if($request->niveau=='none')
		{
			if($request->temps=='none')
			{
				$marche= Marche::where('nom','LIKE','%'.$request->search.'%')
					->orWhere('description','LIKE','%'.$request->search.'%')
					->orWhere('region','LIKE','%'.$request->search.'%');
			}
			else
			{
				if($request->temps=='dj')
				{
					$marche= Marche::where('temps','<=',time('05:00'))
					->where('niveau','LIKE','%'.$request->niveau)
					->where('nom','LIKE','%'.$request->search.'%')
					->orWhere('description','LIKE','%'.$request->search.'%')
					->orWhere('region','LIKE','%'.$request->search.'%');
				}
				else{
					$marche= Marche::where('temps','>',time('05:00'))
					->where('nom','LIKE','%'.$request->search.'%')
					->orWhere('description','LIKE','%'.$request->search.'%')
					->orWhere('region','LIKE','%'.$request->search.'%');
				}
			}
		}
		else
		{
			if($request->temps=='none')
			{
				$marche= Marche::where('niveau','LIKE','%'.$request->niveau.'%')
					->where('nom','LIKE','%'.$request->search.'%')
					->orWhere('description','LIKE','%'.$request->search.'%')
					->orWhere('region','LIKE','%'.$request->search.'%');
			}
			else
			{
				if($request->temps=='dj')
				{
					$marche= Marche::where('niveau','LIKE','%'.$request->niveau.'%')
					->where('temps','<=',time('05:00'))
					->where('niveau','LIKE','%'.$request->niveau)
					->where('nom','LIKE','%'.$request->search.'%')
					->orWhere('description','LIKE','%'.$request->search.'%')
					->orWhere('region','LIKE','%'.$request->search.'%');
				}
				else{
					$marche= Marche::where('niveau','LIKE','%'.$request->niveau.'%')
					->where('temps','>',time('05:00'))
					->where('nom','LIKE','%'.$request->search.'%')
					->orWhere('description','LIKE','%'.$request->search.'%')
					->orWhere('region','LIKE','%'.$request->search.'%');
				}
			}
		}
		return view('search')->with('marches',$marche);
	}

	public function search()
	{
		$marche=[];
		return view('search')->with('marches',$marche);
	}

	public function create()
	{
		return view('newRando');
	}
	public function show($id)
	{
		$marche=Marche::find($id);
		return view('affichage')->with('marches',$marche);
	}

	public function edit($id)
	{
		$marche=Marche::find($id);
		if($marche){
			return view('updateRando')->with('marches',$marche);;
		}
		else{
			return redirect()->back();
		}
	}

	public function update(Request $request)
	{
		$marche=Marche::find($request->input('id'));
        if($marche)
        {
            $marche->nom = $request->input('nom');
            $marche->region = $request->input('region');
            $marche->niveau = $request->input('niveau');
			$marche->temps=$request->input('temps');
			$marche->type=$request->input('type');
            $marche->denivele=$request->input('denivele');
            $marche->distance=$request->input('distance');
            $marche->description=$request->input('description');
			
            $marche->save();
            $marche=Marche::all();
            return redirect()->back();
            // return redirect('user')->withOk("L'utilisateur".$request->input('pseudo'). "a été modifié.");
        }else{
            echo $id;
        }


	}
	public function destroy(Request $request)
	{
		$marche=Marche::find($request->input('id'));
		$marche->delete();

		$transmettre=Marche::all();
		return view('accueil')->with('marches',$transmettre);
	}
}
