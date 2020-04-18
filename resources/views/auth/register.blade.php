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
                                <label for="name" class="col-md-4 control-label">Nom</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <label>{{ $errors->first('name') }}</label>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- On veut l'email de la personne, qui servira à se connecter--}}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                <label for="email" class="col-md-4 control-label ">Adresse email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <label>{{ $errors->first('email') }}</label>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- On veut un mot de passe --}}
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                                <label for="password" class="col-md-4 control-label">Mot de passe</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <label>{{ $errors->first('password') }}</label>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- On veut une confirmation du mot de passe --}}
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 control-label">Confirmer le mot de passe</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                           {{-- La personne donne aussi son niveau estimé (permettra de se contextualiser dans l'environnement de la plateforme) --}}
                            <div class="form-group row">
                                <label for="niveau" class="col-md-4 control-label"> Quel est votre niveau ? </label>
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
                                <label for="groupe" class="col-md-4 control-label"> Aimez-vous marcher en groupe ? </label>
                                <div class="col-md-6">
                                    <input type="radio" id="true" name="groupe" value="true">
                                    <label for="true">Oui</label>
                            
                                    <input type="radio" id="false" name="groupe" value="false" checked>
                                    <label for="false">Non</label>
                                </div>
                            </div>
                                
                                <div class="container">
                                    <h2>D'où venez-vous?</h2>
                                    <div class class="form group row">
                                        <label for="country"> Pays</label>
                                        <select name="country" id="country" class="form-control">
                                            <option value="">Pays</option>
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->nom}}</option>
                                        @endforeach
                                        </select>
                                    <div class class="form group row">
                                        <label for="region">Région</label>
                                        <select name="region" id="region" class="form-control">
                                            <option value="">Region</option>
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
                                                   url:'country/getStates/'+country_id,                                                   
                                                   data:{country:country_id},
                                                   //dataType:'json',
                                                   success:function(data){
                                                        console.log(data);
                                                        $('select[name="region"]').empty();
                                                        data.forEach(region=>{
                                                        $('select[name="region"]')
                                                        .append('<option value="'+region.id+'">'+region.nom+'</option>');
                                                        });
                                                   } 
                                                });
                                            }else{
                                                $('select[name="region"]').empty();
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