@extends('template')

@section('contenu')
<p> Ceci est l'accueil </p>

    @if(count($marches)>0)
            @foreach($marches as $marche)
            <div class="well">
                <h3>{{$marche->nom}}</h3>
            </div>
            @endforeach
        @else
        <p> No marche found</p>
        @endif

@endsection