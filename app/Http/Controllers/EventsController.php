<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MarcheFlash;
use App\Marche;
use App\User;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marches = MarcheFlash::all();
        return view('events')->with('marches',$marches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $this->validate($request, [
        'rdv' =>'required',
    ]);

    //Creation de la Marche à partir des données entrée
    $flash= new MarcheFlash;
    $marche = Marche::find($request->marche_id);
    $user= User::find($request->user_id);
    $flash->rdv=$request->rdv;

    $flash->marche()->associate($marche);
    $flash->user()->associate($user);

    $flash->save();

        //flash->marche_id->associate($marche);
        //flash->user_id->associate($user);
        return('rando_ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
