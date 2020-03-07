@extends('template')

@section('contenu')
    <h1> Création d'une nouvelle marche </h1>
    {!! Form::open(['action' => 'RandoController@store','method'=>'POST'])!!}
        <div class="jumbotron">
            <div class="form-group">
                {!! Form::label('niveau', 'Niveau :') !!}
                {!! Form::text('niveau') !!}
            </div>
            <!--<div class="form-group">
                {!! Form::label('temps', 'Temps :')!!}
                {!! Form::time('temps',) !!}
            </div>-->
            <div class="form-group">
                {!! Form::label('remarque', 'Remarque :')!!}
                {!! Form::textarea('remarque') !!}
            </div>
            <div class="form-group">
                {!! Form::label('nom', 'Nom :')!!}
                {!! Form::text('nom') !!}
            </div>
            <div class="form-group">
                {!! Form::label('createurId', 'Créateur :')!!}
                {!! Form::number('createurId') !!}
            </div>
            <div class="form-group">
                {!! Form::label('region', 'Region :')!!}
                {!! Form::text('region') !!}
            </div>
            {!! Form::submit('Créer',['class' => 'btn btn-primary']) !!}
        </div>
        
    {!! Form::close() !!}
    <!--<br>
    <div class="col-sm-offset-4 col-sm-4">
		<div class="panel panel-info">
			<div class="panel-heading">Tentons....</div>
			<div class="panel-body"> 
				{!! Form::open(['route' => 'newRando.store']) !!}
					<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    {!! Form::label('nom', 'Nom :')!!}
        {!! Form::text('nom') !!}
					</div>
					{!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>-->
@endsection
