@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.employees.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.employees.fields.first-name')</th>
                            <td field-key='first_name'>{{ $employee->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.last-name')</th>
                            <td field-key='last_name'>{{ $employee->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.job-title')</th>
                            <td field-key='job_title'>{{ $employee->job_title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.email')</th>
                            <td field-key='email'>{{ $employee->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.phone')</th>
                            <td field-key='phone'>{{ $employee->phone }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">Tasks</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="tasks">
<table class="table table-bordered table-striped {{ count($tasks) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.tasks.fields.title')</th>
                        <th>@lang('quickadmin.tasks.fields.description')</th>
                        <th>@lang('quickadmin.tasks.fields.equipment')</th>
                        <th>@lang('quickadmin.tasks.fields.start-time')</th>
                        <th>@lang('quickadmin.tasks.fields.end-time')</th>
                        <th>@lang('quickadmin.tasks.fields.employee')</th>
                        <th>@lang('quickadmin.tasks.fields.status')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <tr data-entry-id="{{ $task->id }}">
                    <td field-key='title'>{{ $task->title }}</td>
                                <td field-key='description'>{!! $task->description !!}</td>
                                <td field-key='equipment'>{{ $task->equipment->name or '' }}</td>
                                <td field-key='start_time'>{{ $task->start_time }}</td>
                                <td field-key='end_time'>{{ $task->end_time }}</td>
                                <td field-key='employee'>{{ $task->employee->first_name or '' }}</td>
                                <td field-key='status'>{{ $task->status->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('task_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tasks.restore', $task->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('task_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tasks.perma_del', $task->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('task_view')
                                    <a href="{{ route('admin.tasks.show',[$task->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('task_edit')
                                    <a href="{{ route('admin.tasks.edit',[$task->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('task_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tasks.destroy', $task->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.employees.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
