<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MarcheRequest;
//use App\Repositories\MarcheRepositoryInterface;

class RandoController extends Controller
{
	protected $marcheRepository;
	
	public function __construct(MarcheRepository $marcheRepository)
	{
		$this->marcheRepository = $marcheRepository;
	}


	public function store(MarcheRequest $request)
	{
		$marche= $this->marcheRepository->store($request->all());
		return view('rando_ok');
	}
	public function index()
	{
		return view('newRando');
	}

	public function create()
	{
		return view('rando_ok');
	}
	public function show()
	{
		return view('rando_ok');
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
		return view('rando_ok');
	}




}
