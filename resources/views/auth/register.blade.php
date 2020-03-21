@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="niveau"> Quel est votre niveau ? </label>
                                <input type="radio" id="noir" name="niveau" value="noir">
                                <label for="noir">Noir</label>
                
                                <input type="radio" id="rouge" name="niveau" value="rouge">
                                <label for="rouge">Rouge</label>
                
                                <input type="radio" id="bleu" name="niveau" value="bleu">
                                <label for="bleu">Bleu</label>
                
                                <input type="radio" id="vert" name="niveau" value="vert" checked>
                                <label for="vert">Vert</label>
                
                        </div>
                        <div class="form-group">
                            <label for="region"> Région de prédilection </label>
                            <input type="text" class="form-control" id="region" name="region" placeholder="Région">
                        </div>
                        <div class="form-group">
                            <label for="groupe"> Aimez-vous marcher en groupe ? </label>
                                <input type="radio" id="true" name="groupe" data-value="true">
                                <label for="true">Oui</label>
                
                                <input type="radio" id="false" name="groupe" data-value="false" checked>
                                <label for="false">Non</label>
                            </div>
                            

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="pseudo" class="col-md-4 col-form-label text-md-right">{{ __('Pseudo') }}</label>

                            <div class="col-md-6">
                                <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo') }}" required autocomplete="pseudo" autofocus>

                                @error('pseudo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Addresse email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <input type="password" placeholder="Password" id="password" name="mdp" required>
                            <!--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('mdp') is-invalid @enderror" name="mdp" required autocomplete="new-password">

                                @error('mdp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required -autocomplete="new-password">
                            </div>
                        </div>
                        <!--<div class="form-group row">
                            <input type="password" placeholder="Password" id="password" name="mdp" required>
                            <input type="password" placeholder="Confirm Password" id="confirm_password" required>
                        -->
                    </div>
                        <h2>Questions facultatives</h2>
            <small>Ces questions ont pour but d'améliorer votre expérience sur notre plateforme, vous n'êtes pas obligés de les remplir, et sont accessibles à tout moment.</small>
            
            <div class="form-group">
            <label for="niveau"> Quel est votre niveau ? </label>
                <input type="radio" id="noir" name="niveau" value="noir">
                <label for="noir">Noir</label>

                <input type="radio" id="rouge" name="niveau" value="rouge">
                <label for="rouge">Rouge</label>

                <input type="radio" id="bleu" name="niveau" value="bleu">
                <label for="bleu">Bleu</label>

                <input type="radio" id="vert" name="niveau" value="vert" checked>
                <label for="vert">Vert</label>

            </div>
            {{-- <div class="form-group">
            <label for="groupe"> Aimez-vous marcher en groupe ? </label>
                <input type="radio" id="true" name="groupe" data-value="true">
                <label for="true">Oui</label>

                <input type="radio" id="false" name="groupe" data-value="false" checked>
                <label for="false">Non</label>
            </div>
 --}}
 {{--           <div class="form-group">
                    <label for="region"> Région de prédilection </label>
                    <input type="text" class="form-control" id="region" name="region" placeholder="Région">
            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
