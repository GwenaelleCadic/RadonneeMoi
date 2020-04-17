{{-- Il s'agit de la page propre à chaque utilisateur --}}
@extends('layouts.app')

@section('content')
<div>
            <div class="homeBox1">
                <div class="homeHaut1">                
                    <img src="../uploads/avatars/{{$users->avatar}}" class='photo'>
                    <h2 class='contenue'>{{$users->name}}</h2>
                    <a class='contenue'>{{ $users->email }}</a>                      
                    <a class='contenue'>{{ $users->niveau }}</a>
                    <a class='contenue'>{{ $users->region }}</a>
                    <a class='contenue'>{{ $users->groupe }}</a>    
                </div>
                <div class="homeBox2">
                    Events proposés:
                    @foreach($events as $event)
                        @if($event->user_id==$users->id)
                            <div class="homeMarche">
                                <div class="homeMarcheTitre">
                                    <a href="rando/{{$event->marche_id}}" class='vert'>{{$event->marche->nom}}</a>
                                </div>
                                <div class="presentation">
                                    <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$event->marche->distance}} m</a>
                                    <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$event->marche->denivele}}m</a>
                                    <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$event->marche->niveau}}</a>
                                    <a class="affichageInfoMarche"><strong class="marron">Région:</strong> {{$event->marche->region}}</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                   
                <div class="homeBox2">
                    Marches proposées :
                    @foreach ($marches as $marche)
                        @if($marche->user_id==$users->id)
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
</div>
@endsection
