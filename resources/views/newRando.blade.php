@extends('layouts.app')
@section('content')
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
                <label for="region"> Et dans quelle région se trouve cette beauté? </label>
                <input type="text" class="form-control" id="region" name="region" placeholder="Chez moi">
            </div>
        <div class="form-group">
            <label for="niveau"> Quel est son niveau de difficulté ? </label>
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
            <label for="niveau"> Quel est son niveau de difficulté ? </label>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
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
                </div>
            </div> --}}

            <div class="form-group">
                {{-- On ajoute un temps de marche --}}              
                <label for="temps"> Temps: </label>
                <input type="time" class="form-control" id="temps" name="temps">
            </div>

            <div class="form-group">
                {{-- On ajoute un dénivelé --}}              
                <label for="denivele"> Dénivelé(en m) </label>
                <input type="int" class="form-control" id="denivele" name="denivele">
            
                {{-- On ajoute une distance --}}              
                <label for="distance"> Distance (en m) </label>
                <input type="int" class="form-control" id="distance" name="distance">
            </div>

            {{-- On ajoute une description --}}
            <div class="form-group"> 
                <label for="description"> Description: </label>
                <input type="textarea" class="form-control" id="description" name="description">
            </div>
                    
        <input type="hidden" name="createur" id="createur" value={{ Auth::user()->id }} />     
            {!! Form::submit('Créer',['class' => 'btn btn-primary']) !!}
            {{-- On passe l'id du créateur en variable --}}
</div>

    {!! Form::close() !!}
@endsection
