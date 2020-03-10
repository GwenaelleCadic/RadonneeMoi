@extends('template')

@section('contenu')
    <h1> Création d'une nouvelle marche </h1>
    {!! Form::open(['action' => 'RandoController@store','method'=>'POST'])!!}
        <div class="jumbotron">
        
            <div class="form-group">
                    <label for="nom"> Comment s'appelle cette marche? </label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Ma jolie marche">
                </div>

            <h2>Entrez le chemin</h2>
            <div id="map" class="map"></div>
            <script type="text/javascript">
                var map = new ol.Map({
                    target: 'map',
                    layers: [
                    new ol.layer.Tile({
                        source: new ol.source.OSM()
                    })
                    ],
                    view: new ol.View({
                    center: ol.proj.fromLonLat([37.41, 8.82]),
                    zoom: 4
                    })
                });
            </script>

            <div class="form-group">
            <label for="nom"> Quel est son niveau de difficulté ? </label>
                <!--<div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-dark">
                        <input type="radio" name="niveau" id="noir" checked> Noir
                    </label>
                    <label class="btn btn-danger">
                        <input type="radio" name="niveau" id="rouge"> Rouge
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="niveau" id="bleu"> Bleu
                    </label>
                    <label class="btn btn-success">
                        <input type="radio" name="niveau" id="vert"> Vert
                    </label>
                </div>-->
                <input type="radio" id="noir" name="niveau" value="noir">
                <label for="noir">Noir</label>

                <input type="radio" id="rouge" name="niveau" value="rouge">
                <label for="rouge">Rouge</label>

                <input type="radio" id="bleu" name="niveau" value="bleu">
                <label for="bleu">Bleu</label>

                <input type="radio" id="vert" name="niveau" value="vert">
                <label for="vert">Vert</label>

            </div>

            <div class="form-group">
                {!! Form::label('temps', 'Temps :')!!}
                {!! Form::time('temps') !!}
            </div>

            <div class="form-group">
                {!! Form::label('denivele', 'Dénivelé (en m) :')!!}
                {!! Form::number('denivele', null, ['class' => 'form-control','step' => '1']) !!}

                {!! Form::label('distance', 'Distance (en km) :')!!}
                {!! Form::number('distance', null, ['step' => '0.1']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('remarque', 'Remarque :')!!}
                {!! Form::textarea('remarque') !!}
            </div>

            <!-- Pas pour le moment
            <div class="form-group">
                {!! Form::label('createurId', 'Créateur :')!!}
                {!! Form::number('createurId') !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('region', 'Region :')!!}
                {!! Form::text('region') !!}
            </div>-->

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
