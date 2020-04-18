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

            <div class="container">
                <h2>Et où se trouve cette beautée?</h2>
                <div class class="form group row">
                    <strong for="country"> Pays</strong>
                    <select name="country" id="country" class="form-control">
                        <option value="">Pays</option>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->nom}}</option>
                    @endforeach
                    </select>
                <div class class="form group row">
                    <strong for="region">Région</strong>
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
                               url:'../country/getStates/'+country_id,                                                   
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
                    <input type="int" class="form-control" id="denivele" name="denivele" placeholder="beaucoup trop">
                </div>
            </div>
            <div class="form-group row">
                {{-- On ajoute une distance --}}              
                <label for="distance" class="col-md-4 control-label"> Distance (en m) </label>
                <div class="col-md-6">
                <input type="int" class="form-control" id="distance" name="distance" placeholder="toujours trop">
                </div>
            </div>

            {{-- On ajoute une description --}}
            <div class="form-group row"> 
                <label for="description" class="col-md-4 control-label"> Description: </label>
                <div class="col-md-6">
                <textarea type="textarea" class="form-control" id="description" name="description" cols="70" rows="3" placeholder="lâchez-vous"></textarea>
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
