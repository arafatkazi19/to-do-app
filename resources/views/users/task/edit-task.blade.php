@extends('users.main')


@section('body')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <br>

            <div class="well">
                <h3 class="text-center text-success">Edit Task</h3>
                <hr>
                <h5 class="text-center text-primary">{{Session::get('message')}}</h5>
                <form action="{{route('update-task')}}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">Task Name</label>
                        <div class="col-md-9">
                            <input type="text" name="task_name" class="form-control" value="{{$task->task_name}}">
                            <input type="hidden" name="id" class="form-control" value="{{$task->id}}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Task Description</label>
                        <div class="col-md-9">
                            <textarea type="text" name="task_description" class="form-control" rows="5" cols="30">{{$task->task_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Task Status</label>
                        <div class="col-md-9 radio">
                            <label><input type="radio" name="task_status" {{$task->task_status==1 ? 'checked' : ' '}} value="1" >Completed</label>
                            <label><input type="radio" name="task_status" {{$task->task_status==0 ? 'checked' : ' '}} value="0" >Incomplete</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" value="Update" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

