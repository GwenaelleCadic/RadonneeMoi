@extends('layouts.app')

@section('contenu')
    <h1> Inscription </h1>
    {!! Form::open(['action' => 'UserController@store','method'=>'POST'])!!}
        <div class="jumbotron">
        
            <div class="form-group">
                    <label for="pseudo"> Pseudo </label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Moi">
            </div>
            <div class="form-group">
                    <label for="mdp"> Mot de passe </label>
                    <input type="pasword" class="form-control" id="mdp" name="mdp">
            </div>
            <div class="form-group">
                    <label for="email"> Adresse mail </label>
                    <input type="email" class="form-control" id="email" name="email">
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


            {!! Form::submit('Créer',['class' => 'btn btn-primary']) !!}
        </div>
        
    {!! Form::close() !!}
@endsection
