<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MarcheRequest;
//use App\Repositories\MarcheRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Repositories\MarcheRepository;
use App\Marche;
use App\User;
use App\Country;
use App\Region;
class RandoController extends Controller
{
	protected $marcheRepository;
	
	public function __construct(MarcheRepository $marcheRepository)
	{
		$this->marcheRepository = $marcheRepository;
	}

	// Enregistrement d'une marche
	public function store(Request $request)
	{
		
		//On ne permet l'enregistrement que si toutes les données sont entrées
		$this->validate($request, [
            'nom'=>'required|max:255',
            'niveau'=>'required|max:30',
			'temps'=>'required',
			'region'=>'required',
			'denivele'=>'required',
			'distance'=>'required',
			'description' =>'required',
			'user_id'=>'required',
		]);

		//Creation de la Marche à partir des données entrée
		$user=User::find($request->user_id);
        $region=Region::find($request->input('region'));
		
		$marche= new Marche;
		$marche->nom = $request->input('nom');
		$marche->niveau = $request->input('niveau');
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
		// Association avec les tables étrangères
		$marche->user()-> associate($user);
		$marche->region()->associate($region);
		$marche->save();

		return view('rando_ok');
	}

	// Affichage des marches
	public function index()
	{
		$marche=Marche::all();
		return view('accueil')->with('marches',$marche);
	}

	// Recherche d'une marche
	public function searchRando(Request $request)
	{
		$countries=Country::all();
		// Gestion des entrées
		if($request->region=='none')
		{
			if($request->niveau=='none')
			{
				if($request->temps=='none')
				{
					$marches= Marche::where('nom','LIKE','%'.$request->search.'%')
						->orWhere('description','LIKE','%'.$request->search.'%');
				}
				else
				{
					$marches= Marche::where('type','=',$request->temps);
					$marches=$marches->where('nom','LIKE','%'.$request->search.'%')
					->orWhere('description','LIKE','%'.$request->search.'%');
				}
			}
			else
			{
				if($request->temps=='none')
				{
					$marches= Marche::where('niveau','LIKE','%'.$request->niveau.'%');
					$marches=$marches->where('nom','LIKE','%'.$request->search.'%')
					->orWhere('description','LIKE','%'.$request->search.'%');
				}
				else
				{
					$marches= Marche::where('niveau','LIKE','%'.$request->niveau.'%')
					->where('type','=',$request->temps);
					$marches=$marches->where('nom','LIKE','%'.$request->search.'%')
					->orWhere('description','LIKE','%'.$request->search.'%');
				}
			}
		}
		else
		{
			if($request->niveau=='none')
			{
				if($request->temps=='none')
				{
					$marches= Marche::where('region_id','=','%'.$request->region.'%');
					$marches=$marches->where('nom','LIKE','%'.$request->search.'%')
					->orWhere('description','LIKE','%'.$request->search.'%');
				}
				else
				{
					$marches= Marche::where('type','=',$request->temps)
					->where('region_id','=','%'.$request->region.'%');
					$marches=$marches->where('nom','LIKE','%'.$request->search.'%')
					->orWhere('description','LIKE','%'.$request->search.'%');
					
				}
			}
			else
			{
				if($request->temps=='none')
				{
					$marches= Marche::where('niveau','LIKE','%'.$request->niveau.'%')
					->where('region_id','=','%'.$request->region.'%');
					$marche=$marche->where('nom','LIKE','%'.$request->search.'%')
					->orWhere('description','LIKE','%'.$request->search.'%');
					
				}
				else
				{
						$marches= Marche::where('niveau','LIKE','%'.$request->niveau.'%')
						->where('type','=',$request->temps)
						->where('region_id','=','%'.$request->region.'%');
						$marches=$marches->where('nom','LIKE','%'.$request->search.'%')
						->orWhere('description','LIKE','%'.$request->search.'%');
						
				}
			}
		}
		if($marches->exists())
		{
			$sortie=$marches->get();
		return view('search')->with('marches',$sortie)->with('countries',$countries);
		}
		else
		{
			return redirect()->back()->with('message', "Nous n'avons rien trouvé rentrant dans vos recherches")->with('countries',$countries);
		}
	}

	// Affichage de la page de recherche d'une marche
	public function search()
	{
		$marche=[];
		$countries=Country::all();
		return view('search')->with('marches',$marche)->with('countries',$countries);
	}

	// Création d'une marche
	public function create()
	{
        $countries=Country::all();
		return view('newRando')->with("countries",$countries);
	}

	// Affichage d'une marche
	public function show($id)
	{
		$marche=Marche::find($id);
		return view('affichage')->with('marches',$marche);
	}

	// Affichage de la page de modification d'une rando
	public function edit($id)
	{
		$marche=Marche::find($id);
		$countries=Country::all();
		$regions=Region::where('country_id','=',$marche->region->country_id)->get();
		if($marche){
			return view('updateRando')->with('marches',$marche)->with('countries',$countries)->with('regions',$regions);
		}
		else{
			return redirect()->back();
		}
	}

	// Enregistrement des modifications faites sur une marche
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
		}else
		{
            echo $id;
        }


	}

	// Suppression d'une marche
	public function destroy(Request $request)
	{
		$marche=Marche::find($request->input('id'));
		$marche->delete();

		$transmettre=Marche::all();
		return view('accueil')->with('marches',$transmettre);
	}
}
