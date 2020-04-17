{{-- L'utilisateur met à jour son profil --}}
@extends('layouts.app')

@section('content')
<div>
    {{-- L'utilisateur met à jour son avatar de manière indépendante --}}
    <form enctype="multipart/form-data" action="{{route('profil.update')}}" method="POST">
        <h3> Changer de photo de profil</h3>
        <img src="../../uploads/avatars/{{Auth::user()->avatar}}" class='avatar2'> 
        <input type="file" name="avatar">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" class="pull-right btn btn-sm btn-primary">
    </form>

    {!! Form::open(['route'=>['user.update','{{$user->id}}'], 'method'=>'PUT',]) !!}
        <div>
            <h3>Données:</h3>
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
            {{-- Ancien mot de passe

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                <label for="password" class="col-md-4 control-label">Mot de passe</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
            </div>
            {{-- On veut une confirmation du mot de passe --}}
            {{-- <div class="form-group row">
                <label for="password-confirm" class="col-md-4 control-label">Confirmer le mot de passe</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div> --}}

            {{-- changer le niveau --}}
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

            {{-- changer la région --}}
            <div class="form-group row">
                <label for="region" class="col-md-4 control-label"> Région de prédilection </label>
                <div class="col-md-6">
                    <input style="border: none transparent;" type="text" class="form-control" id="region" name="region" placeholder="Région" value="{{ old('region',$user->region) }}">
                </div>
            </div>

            {{-- changer sa préférence de groupe --}}
            <div class="form-group">
                <label for="groupe"> Aimez-vous marcher en groupe ? </label>
                <div class="col-md-6">
                    <input type="radio" id="true" name="groupe" value="true">
                    <label for="true">Oui</label>

                    <input type="radio" id="false" name="groupe" value="false" checked>
                    <label for="false">Non</label>
                </div>
            </div>

                {{-- L'utilisateur peur mofidier sa description --}}
            <div class="form-group row"> 
                <label for="description" class="col-md-4 control-label"> Description: </label>
                <div class="col-md-6">
                    <input type="textarea" style="border: none transparent;" class="form-control" id="description" name="description" value="{{ old('region',$user->description) }}" cols="70" rows="3">
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
@endsection