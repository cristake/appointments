@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css'/>

    <h3 class="page-title">@lang('quickadmin.tasks.title')</h3>
    @can('task_create')
    <p>
        <a href="{{ route('admin.tasks.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('task_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.tasks.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.tasks.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan

    <!-- <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($tasks) > 0 ? 'datatable' : '' }} @can('task_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('task_delete')
                            @if ( request('show_deleted') != 1 )
                                <th style="text-align:center;">
                                    <input type="checkbox" id="select-all" />
                                </th>
                            @endif
                        @endcan

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
                                @can('task_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='title'>{{ $task->title }}</td>
                                <td field-key='description'>{!! $task->description !!}</td>
                                <td field-key='equipment'>{{ $task->equipment->name or '' }}</td>
                                <td field-key='start_time'>{{ $task->start_time }}</td>
                                <td field-key='end_time'>{{ $task->end_time }}</td>
                                <td field-key='employee'>{{ $task->employee->fullName() }}</td>
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
    </div> -->

    <div id='calendar'></div>
@stop

@section('javascript') 
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        @can('task_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.tasks.mass_destroy') }}'; @endif
        @endcan

        @parent
        $(document).ready(function() {
            var events_array = [
                @foreach($tasks as $task)
                    {
                        title: '{{ $task->title }}',
                        equipment: '{{ $task->equipment->name }}',
                        employee: '{{ $task->employee->fullName() }}',
                        color: '{{ $task->equipment->color }}',
                        start: '{{ $task->start_time }}',
                        end: '{{ $task->end_time }}',
                        url: '{{ route('admin.tasks.edit', $task->id) }}'
                    },
                @endforeach
            ];
            console.log( events_array );
            
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,list'
                },

                selectable: true,
                
                // put your options and callback here
                defaultView: 'agendaWeek',
                
                firstDay: 1,
                
                weekends: false,
                
                minTime: "07:30:00",
                maxTime: "18:30:00",

                businessHours: [ // specify an array instead
                    {
                        dow: [ 1, 4, 5 ],
                        start: '09:00',
                        end: '17:00'
                    },
                    {
                        dow: [ 2, 3 ],
                        start: '08:00',
                        end: '16:00'
                    }
                ],

                events: events_array,
                // eventColor: '#378006',

                // select: function (start, end, jsEvent, view) {
                //     var abc = prompt('Enter Title');
                //     var allDay = !start.hasTime && !end.hasTime;
                //     var newEvent = new Object();
                //     newEvent.title = abc;
                //     newEvent.start = moment(start).format();
                //     newEvent.allDay = false;
                //     $('#calendar').fullCalendar('renderEvent', newEvent);

                // }
            });

        });

    </script>
@endsection