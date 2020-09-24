@extends('layouts.master')@section('content')    <h1>Edit Checklist</h1>    <hr/>    {!! Form::model($checklist, [        'method' => 'PATCH',        'url' => ['checklist', $checklist->id],        'class' => 'form-horizontal'    ]) !!}                <div class="form-group {{ $errors->has('area_id') ? ' form-control-alt is-invalid' : ''}}">                {!! Form::label('area_id', trans('form.ai3e'), ['class' => 'control-label']) !!}                <div class="ekihk">                    {!! Form::number('area_id', null, ['class' => 'form-control']) !!}                    {!! $errors->first('area_id', '<p class="invalid-feedback">:message</p>') !!}                </div>            </div>            <div class="form-group {{ $errors->has('user_id') ? ' form-control-alt is-invalid' : ''}}">                {!! Form::label('user_id', trans('form.usid23'), ['class' => 'control-label']) !!}                <div class="ekihk">                    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}                    {!! $errors->first('user_id', '<p class="invalid-feedback">:message</p>') !!}                </div>            </div>            <div class="form-group {{ $errors->has('id_check_lists') ? ' form-control-alt is-invalid' : ''}}">                {!! Form::label('id_check_lists', 'Id Check Lists: ', ['class' => 'control-label']) !!}                <div class="ekihk">                    {!! Form::text('id_check_lists', null, ['class' => 'form-control']) !!}                    {!! $errors->first('id_check_lists', '<p class="invalid-feedback">:message</p>') !!}                </div>            </div>            <div class="form-group {{ $errors->has('unik_check_lists') ? ' form-control-alt is-invalid' : ''}}">                {!! Form::label('unik_check_lists', 'Unik Check Lists: ', ['class' => 'control-label']) !!}                <div class="ekihk">                    {!! Form::text('unik_check_lists', null, ['class' => 'form-control']) !!}                    {!! $errors->first('unik_check_lists', '<p class="invalid-feedback">:message</p>') !!}                </div>            </div>    <div class="form-group">        <div class="col-sm-offset-3 col-sm-3">            {!! Form::button(__('<i class="fa fa-fw fa-save mr-1"></i> '.trans('form.update')), ['class' => 'btn btn-block btn-hero-primary','type' => 'submit']) !!}        </div>    </div>    {!! Form::close() !!}    @if ($errors->any())        <ul class="alert alert-danger">            @foreach ($errors->all() as $error)                <li>{{ $error }}</li>            @endforeach        </ul>    @endif@endsection