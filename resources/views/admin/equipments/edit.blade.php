@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.equipments.title')</h3>
    
    {!! Form::model($equipment, ['method' => 'PUT', 'route' => ['admin.equipments.update', $equipment->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.equipments.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('is_available', trans('quickadmin.equipments.fields.is-available').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('is_available', 0) !!}
                    {!! Form::checkbox('is_available', 1, old('is_available'), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('is_available'))
                        <p class="help-block">
                            {{ $errors->first('is_available') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

