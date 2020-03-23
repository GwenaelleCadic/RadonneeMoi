<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MarcheRequest;
//use App\Repositories\MarcheRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Repositories\MarcheRepository;
use App\Marche;
class RandoController extends Controller
{
	protected $marcheRepository;
	
	public function __construct(MarcheRepository $marcheRepository)
	{
		$this->marcheRepository = $marcheRepository;
	}


	public function store(Request $request)
	{
		//$marche= $this->marcheRepository->store($request->all());	
		$this->validate($request, [
			//'createurId'=>'required',
            'nom'=>'required|max:255',
            'niveau'=>'required|max:30',
            //'temps'=>'required',
			//'region'=>'required|max:150',
			'denivele'=>'required',
			'distance'=>'required',
			'description' =>'required',
		]);

		//Create Marche
		$marche= new Marche;
		//$marche->createurId = $request->input('createurId');
		$marche->nom = $request->input('nom');
		$marche->niveau = $request->input('niveau');
		//$marche->region = $request->input('region');
		$marche->description = $request->input('description');
		$marche->denivele= $request->input('denivele');
		$marche->distance= $request->input('distance');
		$marche->temps= $request->input('temps');
		$marche->createur=$request->input('createur');
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
		return view('rando_ok');
	}

	public function update()
	{
		return view('rando_ok');
	}
	public function destroy($id)
	{
		$marche=DB::table('marches')
		->where('id',$id)
		->delete();
		return view('rando_ok');
	}
}
