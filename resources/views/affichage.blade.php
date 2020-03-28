@extends('layouts.app')

@section('content')
        <h1> {{$marches->nom}} </h1>
        <small>Date du {{$marches->created_at}}</small>
        <div>
                {{$marches->description}}
        </div>


        {{-- Espace commentaires --}}
        @guest
                @if (Route::has('register'))
                        <div class="form-group">
                                Vous devez vous connecter pour pouvoir commenter
                        </div>                        
                @endif
                @else
                        <div>
                                {!! Form::open(['route'=>['comments.store'], 'method'=>'POST']) !!}
                                
                                
                                <div class="form-group"> 
                                        <label for="body"> Commentaire: </label>
                                        <input type="textarea" class="form-control" id="body" name="body" cols="70" rows="3">
                                </div>
                                <input type="hidden" name="user_id" id="user_id" value={{ Auth::user()->id }} />
                                <input type="hidden" name="marche_id" id="marche_id" value={{ $marches->id }} />  
                                {!! Form::submit('Commenter',['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                        </div>
        @endguest


        <div class="card">
                @foreach($marches->comments as $comment)
                        <div>
                                <strong>{{$comment->user->name}}</strong>
                                {{$comment->created_at->diffForHumans()}}
                        </div>
                        <div class="card-body">
                                {{$comment->body}}
                        </div>
                @endforeach
        </div>

@endsection