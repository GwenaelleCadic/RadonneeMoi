
@extends('layouts.app')

@section('content')
<h1 class="titreAccueil"> Voici ce que nous avons à vous proposer </h1>
<div class="accueilContainer">
    @if(count($marches ?? '')>0)
            @foreach($marches ?? '' as $marche)
            <div class="marche">
                <div class="marcheHaut">
                    <h3> <a href="rando/{{$marche->id}}" class="vert">{{$marche->nom}}</a></h3>
                </div>
                    <div class="presentation">
                        <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$marche->distance}}m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$marche->denivele}}m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Lieu:</strong> {{$marche->region->country->nom}}, {{$marche->region->nom}}</a>
                        <a class="affichageInfoMarche b{{$marche->niveau}}" style="color:white">{{$marche->niveau}}</a>
                        
                    </div>
                    <div class="descrMarche">
                            {{$marche->description}}
                        </div>
                    <hr/>                 
                        <small> créé le :{{$marche->created_at}}  </small>
                        <small> modifié le: {{$marche->updated_at}}</small>
                         par <a href="user/{{$marche->user_id}}">{{$marche->user->name}}</a>
                    </div>
            </div>
            @endforeach
        @else
        <p> Nous sommes désolés, nous n'avons rien à vous proposer, mais cela veut peut être dire qu'en créant une marche, vous deviendrez un pionnier....</p>
    @endif
</div>
@endsection