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
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- On veut l'email de la personne, qui servira à se connecter--}}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                <label for="email" class="col-md-4 control-label">Adresse email</label>

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
                                <label for="password" class="col-md-4 control-label">Mot de passe</label>

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
                                <label for="password-confirm" class="col-md-4 control-label">Confirmer le mot de passe</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                           {{-- La personne donne aussi son niveau estimé (permettra de se contextualiser dans l'environnement de la plateforme) --}}
                           <div class="form-group row">
                            <label for="niveau"> Quel est votre niveau ? </label>
                            <div class="button-wrap">
                                <input type="radio" name="niveau" id="bnoir" class="hidden radio-label">
                                <label for="bnoir" class="button-label bnoir">Noir</label>

                                <input type="radio" name="niveau" id="brouge" class="hidden radio-label">
                                <label for="brouge" class="button-label brouge" >Rouge</label>
          
                                <input type="radio" name="niveau" id="bbleu" class="hidden radio-label">
                                <label for="bbleu" class="button-label bbleu">Bleu</label>
        
                                <input type="radio" name="niveau" id="bvert" class="hidden radio-label" checked>
                                <label for="bvert" class="button-label bvert">Vert</label>
                            </div> 
                           </div>
                           {{-- <div class="form-group row">
                                <label for="niveau"> Quel est votre niveau ? </label>
                                    <input type="radio" id="noir" name="niveau" value="noir">
                                    <label for="noir">Noir</label>
                        
                                    <input type="radio" id="rouge" name="niveau" value="rouge">
                                    <label for="rouge">Rouge</label>
                    
                                    <input type="radio" id="bleu" name="niveau" value="bleu">
                                    <label for="bleu">Bleu</label>
                        
                                    <input type="radio" id="vert" name="niveau" value="vert" checked>
                                    <label for="vert">Vert</label>
                        
                            </div> --}}
                            <div class="form-group row">
                                <label for="region"> Région de prédilection </label>
                                <input type="text" class="form-control" id="region" name="region" placeholder="Région">
                            </div>
                            <div class="form-group">
                                <label for="groupe"> Aimez-vous marcher en groupe ? </label>
                                    <input type="radio" id="true" name="groupe" value="true">
                                    <label for="true">Oui</label>
                        
                                    <input type="radio" id="false" name="groupe" value="false" checked>
                                    <label for="false">Non</label>
                                </div>
                                    

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