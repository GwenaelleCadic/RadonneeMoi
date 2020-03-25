
@extends('layouts.app')

@section('content')
<h1 class="titreAccueil"> Voici ce que nous avons à vous proposer </h1>
<div class='container'>
    @if(count($marches ?? '')>0)
    <ul class="listeAccueil">
            @foreach($marches ?? '' as $marche)
            <div class="marche">
                    <h3> <a href="newRando/{{$marche->id}}" class="vert">{{$marche->nom}}</a></h3>
                    <hr/><strong class="marron">Distance:</strong> {{$marche->distance}} m<br>
                    <strong class="marron">Dénivelé:</strong> {{$marche->denivele}}m<br>
                    <strong class="marron">Niveau:</strong> {{$marche->niveau}}<br>
                    <strong class="marron">Région:</strong> {{$marche->region}}
                    <hr/>                    
                    {{$marche->created_at}}
            </div>
            @endforeach
        </ul>
        @else
        <p> No marche found</p>
        @endif
</div>
@endsection