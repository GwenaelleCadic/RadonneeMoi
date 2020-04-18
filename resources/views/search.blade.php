
@extends('layouts.app')

@section('content')
<div>
<h1 class="titreAccueil"> Que cherchez-vous? </h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="registerBox">
            {!! Form::open(['route'=>['rando.search'], 'method'=>"POST", 'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
               <div class="input-group custom-search-form">
                   <input type="text" class="form-control" name="search" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit"><i class="fa fa-search"> Chercher</i></button>
                    </span>
               </div>
        <div class="container">
        <strong>Complément</strong>
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
    </div>
        <div class="container">
            <strong>Région de recherche</strong>
            <div class class="form group row">
                <label for="country"> Pays</label>
                <select name="country" id="country" class="form-control">
                    <option value="">Pays</option>
                    @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->nom}}</option>
                    @endforeach
                    <option value="" selected> Peu importe</option>
                </select>
            <div class class="form group row">
                <label for="region">Région</label>
                <select name="region" id="region" class="form-control">
                    <option value="none" selected>Peu importe</option>
                </select>
            </div>    
        </div>
        <script>
   
            $(document).ready(function(){
                $('select[name="country"]').on('change',function(){
                    var country_id=$(this).val();
                    if(country_id){
                        $.ajax({
                           type:'GET',
                           url:'../country/getStates/'+country_id,                                                   
                           data:{country:country_id},
                           //dataType:'json',
                           success:function(data){
                                console.log(data);
                                $('select[name="region"]').empty();
                                data.forEach(country=>{
                                $('select[name="region"]')
                                .append('<option value="'+country.country_id+'">'+country.nom+'</option>');
                                });
                           } 
                        });
                    }else{
                        $('select[name="region"]').empty();
                    }
                })
            })
        </script>

       {!! Form::close() !!}
       <br/>
    </div>
         </div>
        </div>
    </div>
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
                        <a class="affichageInfoMarche"><strong class="marron">Lieu:</strong> {!!$marche->region->country->nom!!}, {!!$marche->region->nom!!}</a>
                        <a class="affichageInfoMarche b{{$marche->niveau}}" style="color:white">{{$marche->niveau}}</a>
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
            @if(session()->has('message'))
            <div class="alert alert-success">
                    {{ session()->get('message') }}
            </div>
            @endif
        </div>

</div>
@endsection