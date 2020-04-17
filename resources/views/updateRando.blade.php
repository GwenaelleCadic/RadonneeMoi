@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="newRandoBox">
                {!! Form::open(['route'=>['rando.update','{{$marches->id}}'], 'method'=>'PUT',]) !!}
                    <div class="form-group row">
                        <label for="nom" class="col-md-4 control-label"> Nom</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom',$marches->nom)}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="region" class="col-md-4 control-label"> Région </label>
                        <div class="col-md-6">
                        <input type="text" class="form-control" id="region" name="region" value="{{old('region',$marches->region)}}">
                        </div>
                    </div>

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
                        {{-- On ajoute un temps de marche --}}              
                        <label for="temps" class="col-md-4 control-label"> Temps: </label>
                        <div class="col-md-6">
                        <input type="time" class="form-control" id="temps" name="temps" value="{{old('temps',$marches->temps)}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        {{-- On ajoute un dénivelé --}}              
                        <label for="denivele" class="col-md-4 control-label"> Dénivelé(en m) </label>
                        <div class="col-md-6">
                        <input type="int" class="form-control" id="denivele" name="denivele" value="{{old('denivele',$marches->denivele)}}">
                        </div>
                        {{-- On ajoute une distance --}}              
                        <label for="distance" class="col-md-4 control-label"> Distance (en m) </label>
                        <div class="col-md-6">
                        <input type="int" class="form-control" id="distance" name="distance" value="{{old('distance',$marches->distance)}}">
                        </div>
                    </div>

                    {{-- On ajoute une description --}}
                    <div class="form-group row"> 
                        <label for="description" class="col-md-4 control-label"> Description: </label>
                        <div class="col-md-6">
                        <input type="textarea" class="form-control" id="description" name="description" cols="70" rows="3" value="{{old('description',$marches->description)}}">
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