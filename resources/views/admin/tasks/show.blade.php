@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tasks.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.tasks.fields.title')</th>
                            <td field-key='title'>{{ $task->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tasks.fields.description')</th>
                            <td field-key='description'>{!! $task->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tasks.fields.equipment')</th>
                            <td field-key='equipment'>{{ $task->equipment->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tasks.fields.start-time')</th>
                            <td field-key='start_time'>{{ $task->start_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tasks.fields.end-time')</th>
                            <td field-key='end_time'>{{ $task->end_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tasks.fields.employee')</th>
                            <td field-key='employee'>{{ $task->employee->first_name or '' }}</td>
                        </tr>
                        <!-- <tr>
                            <th>@lang('quickadmin.tasks.fields.status')</th>
                            <td field-key='status'>{{ $task->status->name or '' }}</td>
                        </tr> -->
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.tasks.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
