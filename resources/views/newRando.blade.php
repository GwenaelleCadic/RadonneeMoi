@extends('template')

@section('contenu')
    {!! Form::open(['url' => 'newRando'])!!}
        {!! Form::label('niveau', 'Niveau :') !!}
        {!! Form::text('niveau') !!}
        {!! Form::label('temps', 'Temps :')!!}
        {!! Form::text('temps',) !!}
        {!! Form::label('remarque', 'Remarque :')!!}
        {!! Form::text('remarque') !!}
        {!! Form::submit('Envoyer !') !!}
    {!! Form::close() !!}
@endsection
