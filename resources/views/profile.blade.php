{{-- Il s'agit de la page propre à chaque utilisateur --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {{$user->name}}
        </div>
    </div>
</div>
@endsection
