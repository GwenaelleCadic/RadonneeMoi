
@extends('layouts.app')

@section('content')
<div>
<h1 class="titreAccueil"> Voici les marches à venir </h1>
    @foreach($marches as $marche)
        <div class="marche">
            <h3> <a href="rando/{{$marche->marche_id}}" class="vert">{{$marche->marche->nom}}</a></h3>
            <hr/>
            <div class="presentation">
                <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$marche->marche->distance}} m</a>
                <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$marche->marche->denivele}}m</a>
                <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$marche->marche->niveau}}</a>
                <a class="affichageInfoMarche"><strong class="marron">Région:</strong> {{$marche->marche->region}}</a>
                <a class="affichageInfoMarche"><strong class="marron">Date :</strong> {{$marche->rdv}}</a>
            </div>
            <div class="descrMarche">
                    {{$marche->marche->description}}
                </div>
            <hr/>                 
                Venez marcher avec {{$marche->user->name}}
        </div>
    @endforeach

</div>
@endsection