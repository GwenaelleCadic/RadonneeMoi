{{-- L'utilisateur met à jour son profil --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="titreAccueil"> Mettre à jour le profil</h1>   
            <div class="registerBox">              
                <div class="card-body">
                   
    {{-- L'utilisateur met à jour son avatar de manière indépendante --}}
    <form enctype="multipart/form-data" action="{{route('profil.update')}}" method="POST">
        <h3 class='home'> Changer de photo de profil</h3>
        <img src="../../uploads/avatars/{{Auth::user()->avatar}}" class='avatar2'> 
        <input type="file" name="avatar">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" class="pull-right btn btn-sm btn-primary">
    </form>

    {!! Form::open(['route'=>['user.update','{{$user->id}}'], 'method'=>'PUT',]) !!}
        <div>
            <h3 class='home'>Données:</h3>
            {{-- changer le nom --}}
            <div class="form-group row">
                <label for="name" class="col-md-4 control-label">Nom</label>
                <div class="col-md-6">
                    <input style="border: none transparent;" id="name" type="text" class="form-control" name="name" value="{{old('name',$user->name)}}">
                </div>
            </div>
            {{-- Changer l'emaile--}}
            <div class="form-group row">
                <label for="email" class="col-md-4 control-label">Adresse email</label>
                <div class="col-md-6">
                    <input style="border: none transparent;" id="email" type="email" class="form-control" name="email" value="{{old('email',$user->email) }}">
                </div>
            </div>

            {{-- changer le niveau --}}
            <div class="form-group row">
                <label for="niveau" class="col-md-4 control-label"> Quel est votre niveau ? </label>
                <div class="button-wrap col-md-6">
                    @if(Auth::user()->niveau=='vert')
                    <input type="radio" name="niveau" id="bnoir" class="hidden radio-label" value='noir'>
                    <label for="bnoir" class="button-label bnoir">Noir</label>

                    <input type="radio" name="niveau" id="brouge" class="hidden radio-label" value='rouge'>
                    <label for="brouge" class="button-label brouge" >Rouge</label>

                    <input type="radio" name="niveau" id="bbleu" class="hidden radio-label" value='bleu'>
                    <label for="bbleu" class="button-label bbleu">Bleu</label>

                    <input type="radio" name="niveau" id="bvert" class="hidden radio-label" value='vert' checked>
                    <label for="bvert" class="button-label bvert">Vert</label>
                    @else
                        @if(Auth::user()->niveau=='bleu')
                            <input type="radio" name="niveau" id="bnoir" class="hidden radio-label" value='noir'>
                            <label for="bnoir" class="button-label bnoir">Noir</label>

                            <input type="radio" name="niveau" id="brouge" class="hidden radio-label" value='rouge'>
                            <label for="brouge" class="button-label brouge" >Rouge</label>

                            <input type="radio" name="niveau" id="bbleu" class="hidden radio-label" value='bleu' checked>
                            <label for="bbleu" class="button-label bbleu">Bleu</label>

                            <input type="radio" name="niveau" id="bvert" class="hidden radio-label" value='vert'>
                            <label for="bvert" class="button-label bvert">Vert</label>
                        @else
                            @if(Auth::user()->niveau=='rouge')
                                <input type="radio" name="niveau" id="bnoir" class="hidden radio-label" value='noir'>
                                <label for="bnoir" class="button-label bnoir">Noir</label>

                                <input type="radio" name="niveau" id="brouge" class="hidden radio-label" value='rouge' checked>
                                <label for="brouge" class="button-label brouge" >Rouge</label>

                                <input type="radio" name="niveau" id="bbleu" class="hidden radio-label" value='bleu'>
                                <label for="bbleu" class="button-label bbleu">Bleu</label>

                                <input type="radio" name="niveau" id="bvert" class="hidden radio-label" value='vert'>
                                <label for="bvert" class="button-label bvert">Vert</label>
                            @else
                                <input type="radio" name="niveau" id="bnoir" class="hidden radio-label" value='noir' checked>
                                <label for="bnoir" class="button-label bnoir">Noir</label>

                                <input type="radio" name="niveau" id="brouge" class="hidden radio-label" value='rouge'>
                                <label for="brouge" class="button-label brouge" >Rouge</label>

                                <input type="radio" name="niveau" id="bbleu" class="hidden radio-label" value='bleu'>
                                <label for="bbleu" class="button-label bbleu">Bleu</label>

                                <input type="radio" name="niveau" id="bvert" class="hidden radio-label" value='vert'>
                                <label for="bvert" class="button-label bvert">Vert</label>
                            @endif
                        @endif
                    @endif
                </div> 
            </div>

            {{-- changer la région --}}
            <div class="container">
                <div class class="form group row">
                    <label class="col-md-4 control-label">Lieu</label>
                    <label for="country"> Pays</label>
                    <select name="country" id="country" class="form-control">
                        <option value="">Pays</option>
                        {{-- Affichage du pays déja existent --}}
                        @foreach($countries as $country)
                            @if(Auth::user()->region->country_id==$country->id)
                                <option value="{{$country->id}}" selected>{{$country->nom}}</option>
                            @else
                                <option value="{{$country->id}}">{{$country->nom}}</option>
                            @endif
                        
                    @endforeach
                    </select>
                <div class class="form group row">
                    <label for="region">Région</label>
                    <select name="region" id="region" class="form-control">
                        <option value="">Region</option>
                        @foreach($regions as $region)
                        {{-- Affichage de la région déja existente --}}
                        @if($region->id==Auth::user()->region_id)
                            <option value="{{$region->id}}" selected>{{$region->nom}}</option>
                        @else
                            <option value="{{$region->id}}">{{$region->nom}}</option>
                        @endif
                    @endforeach 
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

            {{-- changer sa préférence de groupe --}}
            <div class="form-group row">
                <label for="groupe" class='col-md-4 control-label'> Aimez-vous marcher en groupe ? </label>
                <div class="col-md-6">                    
                    @if(Auth::user()->groupe=='true')
                        <input type="radio" id="true" name="groupe" value="true" checked>
                        <label for="true">Oui</label>
                        <input type="radio" id="false" name="groupe" value="false">
                        <label for="false">Non</label>
                    @else
                        <input type="radio" id="true" name="groupe" value="true">
                        <label for="true">Oui</label>
                        <input type="radio" id="false" name="groupe" value="false"checked>
                        <label for="false">Non</label>
                    @endif
                    
                </div>
            </div>

                {{-- L'utilisateur peur mofidier sa description --}}
            <div class="form-group row"> 
                <label for="description" class="col-md-4 control-label"> Description: </label>
                <div class="col-md-6">
                    <textarea style="border: none transparent;" class="form-control" id="description" name="description" value="{{ old('region',$user->description) }}" cols="70" rows="3"></textarea>
                </div>
            </div>

            <input type="hidden" name="id" id="id" value={{ Auth::user()->id }} />
            <div class="form-group row">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="connexionBouton">
                        Mettre à jour
                    </button>
                </div>
            </div>

        </form>
    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection