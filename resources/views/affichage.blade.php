@extends('template')

@section('contenu')
<p> Ceci est l'accueil </p>

    @if(count($marches)>0)
            @foreach($marches as $marche)
            <div class="well">
            <p>
                    <h3>{{$marche->nom}}</h3>
                    {{$marche->distance}}
                    {{$marche->denivele}}
                    {{$marche->remarque}}
                    {{$marche->niveau}}
                    {{$marche->created_at}}
                    </p>
            </div>
            @endforeach
        @else
        <p> No marche found</p>
        @endif

@endsection