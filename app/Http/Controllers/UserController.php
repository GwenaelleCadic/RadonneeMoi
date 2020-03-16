<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inscription');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'pseudo'=>'required|unique:users',
            'mdp'=>'required',
            'email'=>'required|email|unique:users',
        ]);

        $user=new User;
        $user->pseudo = $request->input('pseudo');
        $user->mdp = bcrypt($request->input('mdp'));
        $user->email = $request->input('email');
        $user->niveau = $request->input('niveau');
        $user->region=$request->input('region');

        $user->save();
        return view('accueil');

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
        $this->validate($request,[
            'pseudo'=>'required|unique:users,pseudo,' . $id,
            'email'=>'required|email|unique:users,email,'.$id,
        ]);
            
        $this->update($id,$request->all());
        return redirect('user')->withOk("L'utilisateur".$request->input('pseudo'). "a été modifié.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->getById($id)->delete();
    }
}
