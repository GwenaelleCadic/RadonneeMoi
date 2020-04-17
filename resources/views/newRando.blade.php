@extends('layouts.app')
@section('content')
    <h1 class="titreAccueil"> Création d'une nouvelle marche </h1>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="newRandoBox">
        {!! Form::open(['action' => 'RandoController@store','method'=>'POST'])!!}
            <div class="form-group row">
                    <label for="nom" class="col-md-4 control-label"> Comment s'appelle cette marche? </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Ma jolie marche" required>
                    </div>
                </div>

            <div class="form-group row">
                <label for="region" class="col-md-4 control-label"> Et dans quelle région se trouve cette beauté? </label>
                <div class="col-md-6">
                <input type="text" class="form-control" id="region" name="region" placeholder="Chez moi">
                </div>
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

        
            <div class="form-group row">
                <label for="niveau"  class="col-md-4 control-label"> Quel est son niveau ? </label>
                <div class="button-wrap">
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
                {{-- On ajoute un temps de marche --}}              
                <label for="temps" class="col-md-4 control-label"> Temps: </label>
                <div class="col-md-6">
                <input type="time" class="form-control" id="temps" name="temps">
                </div>
            </div>

            <div class="form-group row">
                {{-- On ajoute un dénivelé --}}              
                <label for="denivele" class="col-md-4 control-label"> Dénivelé(en m) </label>
                <div class="col-md-6">
                    <input type="int" class="form-control" id="denivele" name="denivele">
                </div>
            </div>
            <div class="form-group row">
                {{-- On ajoute une distance --}}              
                <label for="distance" class="col-md-4 control-label"> Distance (en m) </label>
                <div class="col-md-6">
                <input type="int" class="form-control" id="distance" name="distance">
                </div>
            </div>

            {{-- On ajoute une description --}}
            <div class="form-group row"> 
                <label for="description" class="col-md-4 control-label"> Description: </label>
                <div class="col-md-6">
                <input type="textarea" class="form-control" id="description" name="description" cols="70" rows="3">
                </div>
            </div>            
                    
                <input type="hidden" name="user_id" id="user_id" value={{ Auth::user()->id }} />     
                    {!! Form::submit('Créer',['class' => 'connexionBouton']) !!}
                    {{-- On passe l'id du créateur en variable --}}
            </div>
        </div>
    </div>
</div>

    {!! Form::close() !!}
@endsection
