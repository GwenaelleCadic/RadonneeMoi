<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Marche;
use App\User;
// use Carbon\Carbon;
class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all()->sortBy('rdv');
        return view('events')->with('events',$events);
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
    $flash= new Event;
    $marche = Marche::find($request->marche_id);
    $user= User::find($request->user_id);
    $flash->rdv=$request->rdv;
    $flash->description=$request->description;

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
