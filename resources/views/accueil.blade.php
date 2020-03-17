
@extends('layouts.app')

@section('content')
<p> Ceci est l'accueil </p>
<div class='container'>
    @if(count($marches ?? '')>0)
    <ul clas='list-group'>
            @foreach($marches ?? '' as $marche)
            <div class="well">
                    <h3><a href="newRando/{{$marche->id}}">{{$marche->nom}}</a></h3>
                    {{$marche->distance}}
                    {{$marche->denivele}}
                    {{$marche->description}}
                    {{$marche->niveau}}
                    {{$marche->created_at}}
            </div>
            @endforeach
        </ul>
        @else
        <p> No marche found</p>
        @endif
</div>
@endsection