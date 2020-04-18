<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Marche;
use App\Country;
use App\Region;
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
     * Affichage du profil d'un utilisateur.
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
     * Form de modification d'un profil utilisateur.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()){
            $user=User::find($id);
            $countries=Country::all();
            $regions=Region::where('country_id','=',$user->region->country_id)->get();
            if($user){
            return view('updateUser')->withUser($user)->with('countries',$countries)->with('regions',$regions);
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    /**
     * Enregistrement de la mise-à-jour d'un profil utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:users,name,' . $request->input('id'),
            'email'=>'required|email|unique:users,email,'.$request->input('id'),
        ]);
        
        $user=User::find($request->input('id'));
        if($user)
        {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->niveau = $request->input('niveau');
            $user->region_id=$request->input('region');
            $user->description=$request->input('description');
            $user->save();
            $marche=Marche::all();
            return redirect('home')->withOk("L'utilisateur".$request->input('name'). "a été modifié.")->with('marches',$marche);
        }else
        {
            echo $id;
        }


    }


    /**
     * Destruction de son propre profil.
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
