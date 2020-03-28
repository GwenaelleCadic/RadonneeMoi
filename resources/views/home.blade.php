{{-- Il s'agit de la page propre à chaque utilisateur --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    {{-- On gère le cas d'un rponème de connection --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
{{-- On affiche les données de l'utilisateur --}}
                    <div class="jumbotron">
                        <ul>
                            <li>{{ Auth::user()->name }}</li>
                            <li>{{ Auth::user()->email }}</li>                           
                        </ul>
                        <br>
                        {{ Auth::user()->niveau }}
                        {{ Auth::user()->region }}
                        {{ Auth::user()->groupe }}                        
                    </div>
                    Marches favorites :
                    <div class="jumbotron">
                        là il y aura des marches
                    </div>
                    Marches proposées :
                    <div class="jumbotron">
                        @foreach ($marches as $marche)
                            @if($marche->createur==Auth::user()->id)
                                {{$marche->nom}}
                            @endif                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
