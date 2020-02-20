<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandoController extends Controller
{
    public function getMarche()
    {
		return view('newRando');
	}

	public function postMarche(Request $request)
	{
		return 'Le nom est ' . $request->input('nom'); 
	}
}
