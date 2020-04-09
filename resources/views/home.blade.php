{{-- Il s'agit de la page propre à chaque utilisateur --}}
@extends('layouts.app')

@section('content')
<div>
    {{-- On gère le cas d'un rponème de connection --}}
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
     @endif
    {{-- On affiche les données de l'utilisateur --}}
    <div class="homeBox1">
        <div>
            <div class="homeHaut1">                
                <img src="uploads/avatars/{{Auth::user()->avatar}}" class='photo'>
                <h2 class='contenue'>{{Auth::user()->name}}</h2>
                <a class='contenue'>{{ Auth::user()->email }}</a>                      
                <a class='contenue'>{{ Auth::user()->niveau }}</a>
                <a class='contenue'>{{ Auth::user()->region }}</a>
                <a class='contenue'>{{ Auth::user()->groupe }}</a>    
            </div>
            <div class='homeBas1'>
            <form enctype="multipart/form-data" action="{{route('profil.update')}}" method="POST">
                    <label> Changer de photo de profil</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>    
        </div>
    </div>
                            
    </div>
    
    <div class="homeBox2">
    Pourraient vous intéresser :
    @guest
        @if( Auth::user()->groupe=='true')
            @foreach($marcheFlashs as $marcheFlash)
            <div class="homeMarche">
                <div class="homeMarcheTitre">
                    <a href="rando/{{$marcheFlash->marche_id}}" class='vert'>{{$marcheFlash->marche->nom}}</a>
                </div>
                <div class="presentation">
                    <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$marcheFlash->marche->distance}} m</a>
                    <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$marcheFlash->marche->denivele}}m</a>
                    <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$marcheFlash->marche->niveau}}</a>
                    <a class="affichageInfoMarche"><strong class="marron">Région:</strong> {{$marcheFlash->marche->region}}</a>
                </div>
            </div>
            @endforeach
        @endif
        @else
            @foreach($marches as $marche)
                @if($marche->createur!=Auth::user()->id && $marche->region==Auth::user()->region && $marche->niveau==Auth::user()->region)
                <div class="homeMarche">
                    <div class="homeMarcheTitre">
                        <a href="rando/{{$marcheFlash->marche_id}}" class='vert'>{{$marcheFlash->marche->nom}}</a>
                    </div>
                    <div class="presentation">
                        <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$marcheFlash->marche->distance}} m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$marcheFlash->marche->denivele}}m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$marcheFlash->marche->niveau}}</a>
                        <a class="affichageInfoMarche"><strong class="marron">Région:</strong> {{$marcheFlash->marche->region}}</a>
                    </div>
                </div>
                @endif
            @endforeach
            @endguest
    </div>
   
    <div class="homeBox2">
        Marches proposées :
        @foreach ($marches as $marche)
            @if($marche->createur==Auth::user()->id)
                <div class="homeMarche">
                    <div class="homeMarcheTitre">
                        <a href="rando/{{$marche->id}}" class='vert'>{{$marche->nom}}</a>
                    </div>
                    <div class="presentation">
                        <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$marche->distance}} m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$marche->denivele}}m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$marche->niveau}}</a>
                        <a class="affichageInfoMarche"><strong class="marron">Région:</strong> {{$marche->region}}</a>
                    </div>
                </div>
            @endif                            
        @endforeach
    </div>
</div>
@endsection
