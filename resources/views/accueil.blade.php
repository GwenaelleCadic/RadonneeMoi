@extends('template')

@section('contenu')
<p> Ceci est l'accueil </p>

    @if(count($marches)>0)
            @foreach($marches as $marche)
            <div class="well">
                    <h3><a href="newRando/{{$marche->id}}">{{$marche->nom}}</a></h3>
                    {{$marche->distance}}
                    {{$marche->denivele}}
                    {{$marche->remarque}}
                    {{$marche->niveau}}
                    {{$marche->created_at}}
            </div>
            @endforeach
        @else
        <p> No marche found</p>
        @endif

@endsection