@extends('layouts.app')

{{-- Page d'inscription --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="registerBox">
                    <div class="connexionTitre">Inscription <small>    (bienvenue chez nous)</small></div>
                    
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            {{-- On veut le nom de la personne --}}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                                <strong for="name" class="col-md-4 control-label marron">Nom</strong>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- On veut l'email de la personne, qui servira à se connecter--}}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                <strong for="email" class="col-md-4 control-label marron">Adresse email</strong>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- On veut un mot de passe --}}
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                                <strong for="password" class="col-md-4 control-label marron">Mot de passe</strong>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- On veut une confirmation du mot de passe --}}
                            <div class="form-group row">
                                <strong for="password-confirm" class="col-md-4 control-label marron">Confirmer le mot de passe</strong>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                           {{-- La personne donne aussi son niveau estimé (permettra de se contextualiser dans l'environnement de la plateforme) --}}
                            <div class="form-group row">
                                <strong for="niveau" class="col-md-4 control-label marron"> Quel est votre niveau ? </strong>
                                <div class="button-wrap col-md-6">
                                    <input type="radio" name="niveau" id="bnoir" class="hidden radio-label" value='noir'>
                                    <label for="bnoir" class="button-label bnoir">Noir</label>

                                    <input type="radio" name="niveau" id="brouge" class="hidden radio-label" value='rouge'>
                                    <label for="brouge" class="button-label brouge" >Rouge</label>
            
                                    <input type="radio" name="niveau" id="bbleu" class="hidden radio-label" value='bleu'>
                                    <label for="bbleu" class="button-label bbleu">Bleu</label>
            
                                    <input type="radio" name="niveau" id="bvert" class="hidden radio-label" value='vert' checked>
                                    <label for="bvert" class="button-label bvert">Vert</label>
                                </div> 
                           </div>

                            <div class="form-group row">
                                <strong for="region" class="col-md-4 control-label marron"> Région de prédilection </strong>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="region" name="region" placeholder="Région">
                                </div>
                            </div>
                            <div class="form-group row">
                                <strong for="groupe" class="col-md-4 control-label marron"> Aimez-vous marcher en groupe ? </strong>
                                <div class="col-md-6">
                                    <input type="radio" id="true" name="groupe" value="true">
                                    <label for="true">Oui</label>
                            
                                    <input type="radio" id="false" name="groupe" value="false" checked>
                                    <label for="false">Non</label>
                                </div>
                            </div>
                                    
                                <button class="btn btn-primary">Hey</button>
                                
                                <div class="container">
                                    <h2>Dropdown feature</h2>
                                    <div class class="form group row">
                                        <strong for="country">Select your Country</strong>
                                        <select name="country" id="country" class="form-control">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->nom}}</option>
                                        @endforeach
                                        </select>
                                    <div class class="form group row">
                                        <strong for="region">Select your Region</strong>
                                        <select name="region" id="region" class="form-control">
                                            <option value="">Region</option>
                                        
                                        </select>
                                    </div>    
                                </div>
                                <script>
                                    $(document).ready(function(){
                                        $('select[name="country"]').on('change',function(){
                                            var country_id=$(this).val();
                                            // console.log(country_id);
                                            if(country_id){
                                                $.ajax({
                                                   type:'GET',
                                                   url:'country/getStates/'+country_id,                                                   
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
                                                $('select[nom="region"]').empty();
                                            }
                                        })
                                    })
                                </script>

                            <div class="form-group row">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="connexionBouton">
                                        S'inscrire
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection