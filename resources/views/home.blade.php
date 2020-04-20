{{-- Il s'agit de la page propre à chaque utilisateur --}}
@extends('layouts.app')

@section('content')
<div>
    {{-- On gère le cas d'un rponème de connection --}}
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
     @endif
    {{-- On affiche les données de l'utilisateur --}}
    <div class="homeBox">
            <div class="homeHaut">
                <div class="col-sm col-lg">                
                    <img src="uploads/avatars/{{Auth::user()->avatar}}" class='photoProf'>
                </div>
                <div class="col-sm col-lg">
                    <h1 class="titreAccueil"> {{Auth::user()->name}}</h1>
                    <div class='titreContenueProf'>adresse:</div><a class='contenueProf'>{{ Auth::user()->email }}</a>                      
                    <div class='titreContenueProf'>niveau:</div><a class='contenueProf'>{{ Auth::user()->niveau }}</a>
                    <div class='titreContenueProf'>Lieu:</div><a class='contenueProf'>{{ Auth::user()->region->country->nom}}, {{ Auth::user()->region->nom}}</a>
                    <div class='titreContenueProf'>groupe:</div>
                        @if( Auth::user()->groupe=='true')<a class='contenueProf'>mondain</a>
                        @else <a class='contenueProf'>solitaire</a>
                        @endif
                </div>
            </div>
            <div class="descrUser">{{Auth::user()->description}}</div> 
            <div class='homeBas1'>
                <a href="user/{{Auth::user()->id}}/edit" class="connexionBouton">
                    Modifier
                </a>
                <button class="btn btn-danger" data-id={{Auth::user()->id}} data-toggle="modal" data-target="#delete">Supprimer mon compte</button>
            </div>    
    </div>
                            
    </div>
    {{-- Affichage des marches/événements rentrant dans les critéres de l'utilisateur --}}
    <h3 class='home'>Cela pourrait vous intéresser :</h3>
    <div class="homeBox2">
        @if(count($events1 ?? '')>0)
            @if(Auth::user()->group=='true')      
                @foreach($events1 as $event)
                <div class="homeMarche">
                    <div class="homeMarcheTitre">
                        <a href="../../rando/{{$event->marche_id}}" class='vert'>{{$event->marche->nom}}</a>
                    </div>
                    <div class="presentation">
                        <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$event->marche->distance}} m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$event->marche->denivele}}m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$event->marche->niveau}}</a>
                        <a class="affichageInfoMarche"><strong class="marron">Lieu:</strong> {{$event->marche->region->country->nom}},</a>
                        <a class="affichageInfoMarche"> {{$event->marche->region->nom}}</a>
                    </div>
                </div>
                @endforeach
            @else
                @foreach($events1 as $event)
                        <div class="homeMarche">
                            <div class="homeMarcheTitre">
                                <a href="../../rando/{{$event->id}}" class='vert'>{{$event->nom}}</a>
                            </div>
                            <div class="presentation">
                                <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$event->distance}} m</a>
                                <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$event->denivele}}m</a>
                                <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$event->niveau}}</a>
                                <a class="affichageInfoMarche"><strong class="marron">Lieu:</strong> {{$event->region->country->nom}},</a>
                                <a class="affichageInfoMarche"> {{$event->region->nom}}</a>
                            </div>
                        </div>
                        @endforeach
            @endif
        @else
            Malheureusement, rien ne semble sortir du lot pour vous
        @endif
    </div>

    {{-- Affichage des marches créées par l'utilisateur --}}
    <h3 class='home'>Marches que vous avez proposées :</h3>
    <div class="homeBox2">
        @if(count($marches ?? '')>0)  
            @foreach ($marches as $marche)
                <div class="homeMarche">
                    <div class="homeMarcheTitre">
                        <a href="../../rando/{{$marche->id}}" class='vert'>{{$marche->nom}}</a>
                    </div>
                    <div class="presentation">
                        <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$marche->distance}} m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$marche->denivele}}m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$marche->niveau}}</a>
                        <a class="affichageInfoMarche"><strong class="marron">Lieu:</strong> {{$marche->region->country->nom}},</a>
                        <a class="affichageInfoMarche">  {{$marche->region->nom}}</a>
                    </div>
                </div>                            
            @endforeach
        @else
                Vous n'avez rien proposé (pour le moment...)
        @endif

    </div>

    {{-- Affichage des événements créé par l'utilisateur --}}
    <h3 class='home'>Events que vous avez proposés :</h3>
    <div class="homeBox2">
        @if(count($events2 ?? '')>0)  
            @foreach ($events2 as $event)
                <div class="homeMarche">
                    <div class="homeMarcheTitre">
                        <a href="../../rando/{{$event->marche->id}}" class='vert'>{{$event->marche->nom}}</a>
                    </div>
                    <div class="presentation">
                        <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$event->marche->distance}} m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$event->marche->denivele}}m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$event->marche->niveau}}</a>
                        <a class="affichageInfoMarche"><strong class="marron">Lieu:</strong> {{$event->marche->region->country->nom}},</a>
                        <a class="affichageInfoMarche"> {{$event->marche->region->nom}}</a>
                    </div>
                </div>                           
            @endforeach
        @else
            Vous n'avez pas d'événements en cours
        @endif
    </div>

    {{-- Affichage des marches enregisrées dans l'historique --}}
    <h3 class='home'>Marches que vous avez enregistrées :</h3>
    <div class="homeBox2">
        @if(count($historiques ?? '')>0)  
            @foreach ($historiques as $historique)
                <div class="homeMarche">
                    <div class="homeMarcheTitre">
                        <a href="../../rando/{{$historique->marche->id}}" class='vert'>{{$historique->marche->nom}}</a>
                    </div>
                    <div class="presentation">
                        <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$historique->marche->distance}} m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$historique->marche->denivele}}m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$historique->marche->niveau}}</a>
                        <a class="affichageInfoMarche"><strong class="marron">Lieu:</strong> {{$historique->marche->region->country->nom}},</a>
                        <a class="affichageInfoMarche"> {{$historique->marche->region->nom}}</a>
                    </div>
                </div>                           
            @endforeach
        @else
            Vous n'avez pas enregistré de marche
        @endif
    </div>
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
                                    Etes-vous sûr de vouloir supprimer votre compte. Toutes vos informations seront définitivement perdues.
                            </p>
                            <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}">

                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Non, Arretez</button>
                            <button type="submit" class="btn btn-warning">Oui, Supprimez</button>
                    </div>
            </form>
    </div>
</div>
@endsection
