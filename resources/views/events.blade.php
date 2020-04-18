
@extends('layouts.app')

@section('content')
<div>
<h1 class="titreAccueil"> Voici les marches à venir </h1>
    {{-- Affichage des informations --}}
    @foreach($events as $event)
        <div class="marche">
            <div class="marcheHaut">
                <h3> <a href="rando/{{$event->marche_id}}" class="vert">{{$event->marche->nom}}</a></h3>
            </div>
            <div class="presentation">
                <a class="affichageInfoMarche"><strong class="marron">Date :</strong> <strong>{{$event->rdv}}</strong></a>
                <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$event->marche->distance}} m</a>
                <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$event->marche->denivele}}m</a>
                <a class="affichageInfoMarche"><strong class="marron">Lieu:</strong> {{$event->marche->region->country->nom}}, {{$event->marche->region->nom}}</a>
                <a class="affichageInfoMarche b{{$event->marche->niveau}}" style="color:white">{{$event->marche->niveau}}</a>

            </div>
            <div class="descrMarche">
                    {{$event->description}}
                </div>
            <hr/>                 
                Venez marcher avec <a href="user/{{$event->user_id}}">{{$event->user->name}}</a>
        </div>
    @endforeach

</div>
@endsection