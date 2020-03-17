@extends('layouts.app')

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
                            <label for="mdp" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe:') }}</label>

                            <div class="col-md-6">
                                <input id="mdp" type="password" class="form-control @error('mdp') is-invalid @enderror" name="mdp" required autocomplete="new-password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
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
            <div class="form-group">
            <label for="groupe"> Aimez-vous marcher en groupe ? </label>
                <input type="radio" id="true" name="groupe" data-value="true">
                <label for="true">Oui</label>

                <input type="radio" id="false" name="groupe" data-value="false" checked>
                <label for="false">Non</label>
            </div>

            <div class="form-group">
                    <label for="region"> Région de prédilection </label>
                    <input type="text" class="form-control" id="region" name="region" placeholder="Région">
            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
