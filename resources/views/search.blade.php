
@extends('layouts.app')

@section('content')
<div>
<h1 class="titreAccueil"> Que cherchez-vous? </h1>
{!! Form::open(['route'=>['rando.search'], 'method'=>"POST", 'class'=>'navbar-form navbar-left','role'=>'search'])  !!}

               <div class="input-group custom-search-form">
                   <input type="text" class="form-control" name="search" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit"><i class="fa fa-search"> Chercher</i></button>
                    </span>
               </div>
        Complément
        <div class="presentation">
            <label for="niveau"> Le niveau recherché? </label>
            <div class="button-wrap">
                <input type="radio" name="niveau" id="bnoir" class="hidden radio-label" value='noir'>
                <label for="bnoir" class="button-label bnoir">Noir</label>

                <input type="radio" name="niveau" id="brouge" class="hidden radio-label" value='rouge'>
                <label for="brouge" class="button-label brouge" >Rouge</label>

                <input type="radio" name="niveau" id="bbleu" class="hidden radio-label" value='bleu'>
                <label for="bbleu" class="button-label bbleu">Bleu</label>

                <input type="radio" name="niveau" id="bvert" class="hidden radio-label" value='vert'>
                <label for="bvert" class="button-label bvert">Vert</label>

                <input type='radio' name='niveau' id='bnone' class="hidden radio-label" value='none' checked>
                <label for='bnone' class="button-label bnone">Peu importe</label>
            </div> 
            <label for="temps"> Le temps? </label>
            <select id="temps">
                <option value="dj">Demi-journée</option>
                <option value="j">Journée</option>
                <option value="none" selected>Peu importe</option>
            </select>
        </div>

        {{-- <div class="form-group row">
            <label for="temps"> La région </label>
            <div class="button-wrap">
                <input type="radio" name="temps" id="bnoir" class="hidden radio-label" value='dj'>
                <label for="bnoir" class="button-label bnoir">Demi-journée</label>

                <input type="radio" name="temps" id="brouge" class="hidden radio-label" value='j'>
                <label for="brouge" class="button-label brouge" >Journée</label>

                <input type='radio' name='temps' id='none' value='none' checked>
                <label for='none'>Peu importe</label>
            </div> 
        </div> --}}

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
                        <a class="affichageInfoMarche"><strong class="marron">Distance:</strong> {!!$marche->distance!!} m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Dénivelé:</strong> {!!$marche->denivele!!}m</a>
                        <a class="affichageInfoMarche"><strong class="marron">Niveau:</strong> {!!$marche->niveau!!}</a>
                        <a class="affichageInfoMarche"><strong class="marron">Région:</strong> {!!$marche->region!!}</a>
                    </div>
                    <div class="descrMarche">
                            {!!$marche->description!!}
                        </div>
                    <hr/>                 
                        <small> créé le :{!!$marche->created_at!!}  </small>
                        <small> modifié le: {!!$marche->updated_at!!}</small>
                            par {!!$marche->user->name!!}
                    </div>
            </div>
                    
                @endforeach
            @endif
       </div>

</div>
@endsection