<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Marche;
use Image;
use Auth;
use App\Event;
class UserController extends Controller
{


    //Gestion de l'ajout d'une photo de profil
    public function update_avatar(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $avatar=$request->file('avatar');
            $filename=time().".".$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('uploads/avatars/'.$filename));
        
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }


        $marche=Marche::all();
		return redirect()->back();
    }
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

            $marche=Marche::all();
            return view('accueil')->with('marches',$marche);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        $marches=Marche::all();
        $events=Event::all();
		return view('profile')->with('users',$user)->with('marches',$marches)->with('events',$events);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()){
            $user=User::find($id);
            if($user){
            return view('updateUser')->withUser($user);
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $this->validate($request,[
        //     'pseudo'=>'required|unique:users,pseudo,' . $id,
        //     'email'=>'required|email|unique:users,email,'.$id,
        // ]);
        
        $user=User::find($request->input('id'));
        if($user)
        {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->niveau = $request->input('niveau');
            $user->region=$request->input('region');
            $user->description=$request->input('description');
            $user->save();
            $marche=Marche::all();
            return redirect('home')->withOk("L'utilisateur".$request->input('name'). "a été modifié.")->with('marches',$marche);
        }else{
            echo $id;
        }


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auth::logout();
        $user=User::find($request->input('id'));
		$user->delete();
        
        $marche=Marche::all();
        return view('accueil')->with('marches',$marche);
    }
}
