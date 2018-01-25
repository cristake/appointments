@extends('layouts.app')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <h3 class="page-title">@lang('quickadmin.equipments.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.equipments.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
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
                    {!! Form::label('color', trans('quickadmin.equipments.fields.color'), ['class' => 'control-label']) !!}
                    <div id="colorpicker" class="input-group colorpicker-component" title="Using input value">
                        <span class="input-group-addon"><i></i></span>
                        {!! Form::text('color', old('color', '#DD0F20'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('is_available', trans('quickadmin.equipments.fields.is-available').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('is_available', 0) !!}
                    {!! Form::checkbox('is_available', 1, true, []) !!}
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

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.min.js"></script>
    <script type="text/javascript">
        $('#colorpicker').colorpicker();
    </script>
@endsection
