@extends('layouts.app')

@section('content')
        @if(session()->has('message'))
        <div class="alert alert-success">
                {{ session()->get('message') }}
        </div>
        @endif
        <h1 class='titreMarche'> {{$marches->nom}} </h1>      
        <h2 class='marron'> Informations</h2>
        <div>
                <div class="fond">
                <div class='titreContenue'>Distance à parcourir:</div><a class='contenue'>{{$marches->distance}}m</a>
                <div class='titreContenue'>Denivelé à supporter:</div><a class='contenue'>{{$marches->denivele}}m</a>
                <div class='titreContenue'>Temps à marcher:</div><a class='contenue'>{{$marches->temps}}</a>
                <div class='titreContenue'>Son niveau:</div><a class='contenue'>{{$marches->niveau}}</a>
                <div class='titreContenue'>Région de cette beauté:</div><a class='contenue'>{{$marches->region}}</a>
                </div>
        <h2 class='marron'> Description</h2>
        <div class="fond">
                <div class="descrMarche2">
                        {{$marches->description}}
                </div>
        </div>

        <small>Date du {{$marches->created_at}},   Modifié le {{$marches->updated_at}} par {{$marches->user->name}}</small>    
        <script>
                                $(document).ready(function(){
	$('#Mybtn').click(function(){
  		$('#MyForm').toggle(500);
  });
});
                        </script>

        {{-- On donne la possibilité au créateur de modifier et supprimer la marche et aux utilisateurs de créer un événement--}}

        <div class='btnMarches'>
                
                @guest
                        @if (Route::has('register'))        
                        @endif
                        @else
                        {{-- On enregistre la marche dans notre historique --}}
                        <div>
                                {!! Form::open(['route'=>['historique.store'], 'method'=>'POST']) !!}
                                <input type="hidden" name="user_id" id="user_id" value={{ Auth::user()->id }} />
                                <input type="hidden" name="marche_id" id="marche_id" value={{ $marches->id }} />  
                                {!! Form::submit('Enregistrer',['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                        </div>
                        {{-- Création d'un event --}}
                        {{-- <div class="details" style="display:none"> --}}
                                <button id="Mybtn" class="btn btn-primary">Créer un événement</button>
                                {!! Form::open(['route' => ['events.store'], 'id'=>'MyForm','method'=>'POST'])!!}
                                        <input type='hidden' name='user_id' id='user_id' value={{ Auth::user()->id }} />
                                        <input type='hidden' name='marche_id' id='marche_id' value={{$marches->id}} />
                                        <div class="form-group row">             
                                                <label for="temps" class="col-md-4 control-label"> Date de l'événement: </label>
                                                <div class="col-md-6">
                                                        <input type='datetime-local' name='rdv' id='rdv'>
                                                </div>
                                        </div>
                                        <div class="form-group row">             
                                                <label for="temps" class="col-md-4 control-label"> Description </label>
                                                <div class="col-md-6">
                                                        <textarea class="form-control" id="body" name="description" rows="3"></textarea>
                                                </div>
                                                {!! Form::submit('Créer',['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                                </div>
                                
                        {{-- </div>
                        <a id ="more" href="#" onclick="$('.details').slideToggle(function(){
                                $('#more').html($('.details').is(':visible')?'Annuler':'Créer un événement');
                                });">Créer un événement</a> --}}

                                @if($marches->user_id==Auth::user()->id)
                                                <a href="{{$marches->id}}/edit" class="connexionBouton">
                                                        Modifier
                                                </a>
                                                <button class="btn btn-danger" data-id={{$marches->id}} data-toggle="modal" data-target="#delete">Supprimer</button>
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
        <div class="commentBox">
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
        <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
                    </div>
                        {!! Form::open(['route'=>['rando.destroy','test'], 'method'=>'POST']) !!}

                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <div class="modal-body">
                                        <p class="text-center">
                                                Etes-vous sûr de vouloir supprimer cette marche?
                                        </p>
                                        <input type="hidden" name="id" id="id" value="{{$marches->id}}">

                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Non, Arretez</button>
                                        <button type="submit" class="btn btn-warning">Oui, Supprimez</button>
                                </div>
                        </form>
                </div>
        </div>
</div>

@endsection