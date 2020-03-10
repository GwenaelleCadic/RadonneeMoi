@extends('template')

@section('contenu')
<p> Ceci est l'accueil </p>

    @if(count($marches)>0)
            @foreach($marches as $marche)
            <div class="well">
                <p>
                    {{$marche->nom}}
                    {{$marche->distance}}
                    {{$marche->denivele}}
                    {{$marche->remarque}}
                    {{$marche->niveau}}
                </p>
            </div>
            @endforeach
        @else
        <p> No marche found</p>
        @endif

@endsection