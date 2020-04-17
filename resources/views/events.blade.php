
@extends('layouts.app')

@section('content')
<div>
<h1 class="titreAccueil"> Voici les marches à venir </h1>
    @foreach($events as $event)
        <div class="marche">
            {{$event->rdv}}<h3> <a href="rando/{{$event->marche_id}}" class="vert">{{$event->marche->nom}}</a></h3>
            <hr/>
            <div class="presentation">
                <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$event->marche->distance}} m</a>
                <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$event->marche->denivele}}m</a>
                <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$event->marche->niveau}}</a>
                <a class="affichageInfoMarche"><strong class="marron">Région:</strong> {{$event->marche->region}}</a>
                <a class="affichageInfoMarche"><strong class="marron">Date :</strong> {{$event->rdv}}</a>
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