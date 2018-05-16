@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            @include('common.errors')

            <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                <div class="form-grup">
                    <label for="name" class="col-sm-3 control-label">Task</label>
                    <div class="col-sm-6">
                    <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>
                <div class="form-grup">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">Add Task</button>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    @if ($tasks->count())
        <div class="panel panel-default">
            <div class="panel-heading">
                Current tasks
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td>
                                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
