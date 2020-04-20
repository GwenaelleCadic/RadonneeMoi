@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="titreAccueil"> Modification de la marche</h1>

            <div class="newRandoBox">
                {!! Form::open(['route'=>['rando.update','{{$marches->id}}'], 'method'=>'PUT',]) !!}
                    <div class="form-group row">
                        <label for="nom" class="col-md-4 control-label"> Nom</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom',$marches->nom)}}">
                        </div>
                    </div>
                    <div class="container">
                        Région de prédilection
                        <div class class="form group row">
                            <strong for="country"> Pays</strong>
                            <select name="country" id="country" class="form-control">
                                <option value="">Pays</option>
                                @foreach($countries as $country)
                                {{-- On affiche le pays déjà rentrée --}}
                                    @if($marches->region->country==$country)
                                        <option value="{{$country->id}}" selected>{{$country->nom}}</option>
                                    @else
                                        <option value="{{$country->id}}">{{$country->nom}}</option>
                                    @endif
                            @endforeach
                            </select>
                        <div class class="form group row">
                            <strong for="region">Région</strong>
                            <select name="region" id="region" class="form-control">
                                <option value="">Region</option>
                                {{-- On affiche la région déjà rentrée --}}
                                {@foreach($regions as $region)
                                    @if($region==$marches->region)
                                        <option value="{{$region->id}}" selected>{{$region->nom}}</option>
                                    @else
                                        <option value="{{$region->id}}">{{$region->nom}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>    
                    </div>
                    {{-- Gestion des dropdown --}}
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
                                            data.forEach(country=>{
                                            $('select[name="region"]')
                                            .append('<option value="'+country.country_id+'">'+country.nom+'</option>');
                                            });
                                       } 
                                    });
                                }else{
                                    $('select[name="region"]').empty();
                                }
                            })
                        })
                    </script>
                    
                    {{-- le niveau --}}
                    <div class="form-group row">
                        <label for="niveau" class="col-md-4 control-label"> Niveau</label>
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
                    
                    <div class="form-group row">
                        {{-- temps de marche --}}              
                        <label for="temps" class="col-md-4 control-label"> Temps: </label>
                        <div class="col-md-6">
                        <input type="time" class="form-control" id="temps" name="temps" value="{{old('temps',$marches->temps)}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        {{-- dénivelé --}}              
                        <label for="denivele" class="col-md-4 control-label"> Dénivelé(en m) </label>
                        <div class="col-md-6">
                        <input type="int" class="form-control" id="denivele" name="denivele" value="{{old('denivele',$marches->denivele)}}">
                        </div>
                        {{-- distance --}}              
                        <label for="distance" class="col-md-4 control-label"> Distance (en m) </label>
                        <div class="col-md-6">
                        <input type="int" class="form-control" id="distance" name="distance" value="{{old('distance',$marches->distance)}}">
                        </div>
                    </div>

                    {{-- description --}}
                    <div class="form-group row"> 
                        <label for="description" class="col-md-4 control-label"> Description: </label>
                        <div class="col-md-6">
                        <textarea type="textarea" class="form-control" id="description" name="description" cols="70" rows="3" value="{{old('description',$marches->description)}}"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id" value={{$marches->id}} />
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
    </div>
</div>

@endsection