<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Marche;
use App\User;
class CommentsController extends Controller
{
    /**
     * Enregistrer un nouveau commentaires
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'body' =>'required|max:2000'
        ));
        $marche = Marche::find($request->marche_id);
        $user= User::find($request->user_id);

        $comment = new Comment();
        $comment->body=$request->body;

        $comment->marche()->associate($marche);
        $comment->user()->associate($user);
        
        $comment->save();

        return back();
    }

}
