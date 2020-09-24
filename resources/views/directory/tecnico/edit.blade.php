@extends('layouts.master')

@section('content')

    <h1>Edit Tecnico</h1>
    <hr/>

    {!! Form::model($tecnico, [
        'method' => 'PATCH',
        'url' => ['tecnico', $tecnico->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('user_id') ? ' form-control-alt is-invalid' : ''}}">
                {!! Form::label('user_id', 'User Id: ', ['class' => 'control-label']) !!}
                <div class="ekihk">
                    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('user_id', '<p class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('informe_manto_prev_id') ? ' form-control-alt is-invalid' : ''}}">
                {!! Form::label('informe_manto_prev_id', 'Informe Manto Prev Id: ', ['class' => 'control-label']) !!}
                <div class="ekihk">
                    {!! Form::number('informe_manto_prev_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('informe_manto_prev_id', '<p class="invalid-feedback">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection