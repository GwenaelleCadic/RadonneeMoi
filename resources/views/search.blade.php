
@extends('layouts.app')

@section('content')
<div>
<h1 class="titreAccueil"> Que cherchez-vous? </h1>
{!! Form::open(['route'=>['rando.search'], 'method'=>"POST", 'class'=>'navbar-form navbar-left','role'=>'search'])  !!}

               <div class="input-group custom-search-form">
                   <input type="text" class="form-control" name="search" placeholder="Search...">
                   <span class="input-group-btn">

       <button class="btn btn-default-sm" type="submit">
           <i class="fa fa-search">i
       </button>

       <div class="form-group">
            <input type="radio" id="nom" name="type" value="nom" checked>
            <label for="nom">Nom</label>

            <input type="radio" id="niveau" name="type" value="niveau">
            <label for="niveau">Niveau</label>

            <input type="radio" id="region" name="type" value="region">
            <label for="region">Région</label>

            <input type="radio" id="createur" name="type" value="createur">
            <label for="createur">Auteur</label>
        </div>
        </span>
       {!! Form::close() !!}
       <br/>
    </div>
       <div>
            @if(count($marches ?? '')>0)
                @foreach ($marches as $marche)
                <div class="marche">
                    <h3> <a href="rando/{{$marche->id}}" class="vert">{{$marche->nom}}</a></h3>
                    <hr/>
                    <div class="presentation">
                        <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {{$marche->distance}} m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {{$marche->denivele}}m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {{$marche->niveau}}</a>
                        <a class="affichageInfoMarche"><strong class="marron">Région:</strong> {{$marche->region}}</a>
                    </div>
                    <div class="descrMarche">
                            {{$marche->description}}
                        </div>
                    <hr/>                 
                        <small> créé le :{{$marche->created_at}}  </small>
                        <small> modifié le: {{$marche->updated_at}}</small>
                        {{-- attend une nouvelle migration:
                            par {{$marche->user->name}} --}}
                    </div>
            </div>
                    
                @endforeach
            @endif
       </div>

</div>
@endsection