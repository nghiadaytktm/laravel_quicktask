@extends('templates.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('index.error')

    <!-- New Task Form -->
            {!! Form::open([

                            'method' => 'post',
                            'class' => 'form-horizontal',
                           ]) !!}
            {!! Form::token(); !!}
        <!-- Task Name -->
            <div class="form-group">
                {!! Form::label('task',trans('message.task'),array('class' =>'col-sm-3 control-label')
                ) !!}
                <div class="col-sm-6">
                    {!! Form::text('name','',array('class' =>'form-control',
                                                             'id' => 'task-name')
                ) !!}
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    {{ Form::button('<i class="fa fa-plus"></i>'.trans('message.add-task'),
                    [
                    'class' => 'btn btn-default',
                    'type' =>'submit',
                    'name' =>'submit',
                    ]) }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    <!-- Current Tasks -->

        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('message.current-task')
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>@lang('message.task')</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>
                            <td>
                                {{--<form action="{{ url('task/'.$task->id) }}" method="POST">--}}
                                    {!! Form::open(array('url' => 'task/'.$task->id,
                                                         'method' => 'post')) !!}
                                        {!! Form::token(); !!}
                                    {{ method_field('DELETE') }}
                                    {{ Form::button('<i class="fa fa-trash"></i>'.trans('message.delete'),[
                                                                                                            'class' => 'btn btn-danger',
                                                                                                            'type' =>'submit',
                                                                                                            ]) }}
                                    {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection