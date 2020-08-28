@extends('users.main')

@section('body')

    <div class="panel">
        <div class="panel-body">
            <h5 class="text-center text-success">{{Session::get('message')}}</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Sl No.</th>
                    <th>Task Name</th>
                    <th>Task Description</th>
                    <th>Task Status</th>
                    <th>Action</th>
                </tr>
                @php($i=1)
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$task->task_name}}</td>
                        <td>{{$task->task_description}}</td>
                        <td>{{$task->task_status==1 ? 'Completed' : 'Incomplete'}}</td>
                        <td>
                            @if($task->task_status==1)
                                <a href="{{route('task-incomplete',['id'=>$task->id])}}" class="btn btn-info">
                                    <span class="glyphicon glyphicon-arrow-up"></span></a>
                            @else
                                <a href="{{route('task-complete',['id'=>$task->id])}}" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-arrow-down"></span></a>
                            @endif
                            <a href="{{route('edit-task',['id'=>$task->id])}}" class="btn btn-success">
                                <span class="glyphicon glyphicon-edit"></span></a>
                            <a href="{{route('delete-task',['id'=>$task->id])}}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @endsection
