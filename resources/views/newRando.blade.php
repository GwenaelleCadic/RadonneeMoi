@extends('template')

@section('contenu')
    {!! Form::open(['url' => 'newRando'])!!}
        {!! Form::label('niveau', 'Niveau :') !!}
        {!! Form::text('niveau') !!}
        {!! Form::label('temps', 'Temps :')!!}
        {!! Form::time('temps',) !!}
        {!! Form::label('remarque', 'Remarque :')!!}
        {!! Form::text('remarque') !!}
        {!! Form::label('nom', 'Nom :')!!}
        {!! Form::text('nom') !!}
        {!! Form::label('createurId', 'Créateur :')!!}
        {!! Form::number('createurId') !!}
        {!! Form::label('region', 'Region :')!!}
        {!! Form::text('region') !!}
        {!! Form::submit('Envoyer !') !!}
    {!! Form::close() !!}
@endsection
