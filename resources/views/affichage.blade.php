@extends('template')

@section('contenu')
        <h1> {{$marches->nom}} </h1>
        <small>Date du {{$marches->created_at}}</small>
        <div>
                {{$marches->remarque}}
        </div>
@endsection