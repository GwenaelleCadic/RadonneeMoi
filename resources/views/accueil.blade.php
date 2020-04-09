
@extends('layouts.app')

@section('content')
<h1 class="titreAccueil"> Voici ce que nous avons à vous proposer </h1>
<div>
    @if(count($marches ?? '')>0)
    {{-- <ul class="listeAccueil"> --}}<ul>
            @foreach($marches ?? '' as $marche)
            <div class="marche">
                    <h3> <a href="rando/{{$marche->id}}" class="vert">{{$marche->nom}}</a></h3>
                    <hr/>
                    <div class="presentation">
                        <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$marche->distance}} m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$marche->denivele}}m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$marche->niveau}}</a>
                        <a class="affichageInfoMarche"><strong class="marron">Région:</strong> {{$marche->region}}</a>
                    </div>
                    <div class="descrMarche">
                            {{$marche->description}}
                        </div>
                    <hr/>                 
                        <small> créé le :{{$marche->created_at}}  </small>
                        <small> modifié le: {{$marche->updated_at}}</small>
                        {{-- attend une nouvelle migration:
                            par {{$marche->user->name}} --}}
                    </div>
            </div>
            @endforeach
        </ul>
        @else
        <p> No marche found</p>
        @endif
</div>
@endsection