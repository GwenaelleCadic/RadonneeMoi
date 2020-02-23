<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcheRequest;
use App\Repositories\MarcheRepository;

use Illuminate\Http\Request;

class RandoController extends Controller
{
    public function getMarche()
    {
		return view('newRando');
	}

	public function postMarche(
		MarcheRequest $request,
		MarcheRepositoryInterface $marcheRepository
	)
	{
		$marcheRepository->save($request->input('marches'));

		return view('rando_ok');
	}
}
