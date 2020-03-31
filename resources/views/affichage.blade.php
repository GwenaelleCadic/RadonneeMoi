@extends('layouts.app')

@section('content')
        <h1 class='titreMarche'> {{$marches->nom}} </h1>      
        <h2 class='marron'> Informations</h2>
        <div>
                <div class="fond">
                <div class='titreContenue'>Distance à parcourir:</div><a class='contenue'>{{$marches->distance}}</a>
                <div class='titreContenue'>Denivelé à supporter:</div><a class='contenue'>{{$marches->denivele}}</a>
                <div class='titreContenue'>Temps à marcher:</div><a class='contenue'>{{$marches->temps}}</a>
                <div class='titreContenue'>Région de cette beauté:</div><a class='contenue'>{{$marches->region}}</a>
                </div>
        <h2 class='marron'> Description</h2>
        <div class="fond">
                <div class="descrMarche2">
                        {{$marches->description}}
                </div>
        </div>

        <small>Date du {{$marches->created_at}},   Modifié le {{$marches->updated_at}}</small>
        
        {{-- On donne la possibilité au créateur de modifier et supprimer la marche --}}
        @guest
                @if (Route::has('register'))        
                @endif
                @else
                        @if($marches->createur==Auth::user()->id)
                        <div class='btnMarches'>
                                <form action="{{ URL::route('newRando.destroy', $marches->id) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <div type="submit" class='btn btn-danger' onclick="return confirm('Are you sure?')"> Supprimer</div>
                                </form>                                       
                                <div class='btn btn-primary'>Modifier</div>
                        </div>
                        @endif
                
        @endguest
        
        {{-- Espace commentaires --}}
        @guest
                @if (Route::has('register'))
                <hr/>
                        <strong>Vous devez vous connecter pour pouvoir commenter</strong>                        
                @endif
                @else
                        <div>
                                {!! Form::open(['route'=>['comments.store'], 'method'=>'POST']) !!}
                                
                                
                                <div class="form-group"> 
                                        <h2 class='marron'> Commentaire</h2>
                                        <textarea class="form-control" id="body" name="body" cols="70" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="user_id" id="user_id" value={{ Auth::user()->id }} />
                                <input type="hidden" name="marche_id" id="marche_id" value={{ $marches->id }} />  
                                {!! Form::submit('Commenter',['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                        </div>
        @endguest


        {{-- Affichage des commentaires existants (et ce pour tout le monde) --}}
        <div class="card">
                @foreach($marches->comments as $comment)
                <div class="commentaire">
                        <div>
                                <strong>{{$comment->user->name}}</strong>
                                {{$comment->created_at->diffForHumans()}}
                        </div>
                        <div class="card-body">
                                {{$comment->body}}
                        </div>
                </div>
                @endforeach
        </div>

@endsection