@extends('layouts.app')

@section('content')
        <h1> {{$marches->nom}} </h1>
        <small>Date du {{$marches->created_at}}</small>
        <div>
                {{$marches->description}}
        </div>
@endsection