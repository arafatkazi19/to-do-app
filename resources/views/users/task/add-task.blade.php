@extends('users.main')

@section('body')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <br>
            <h5 class="text-center text-success">{{Session::get('message')}}</h5>
            <div class="well">
                <h3 class="text-center text-success">Add Task</h3>
                <hr>

                <form action="{{route('new-task')}}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">Task Name</label>
                        <div class="col-md-9">
                            <input type="text" name="task_name" class="form-control">
                            <span class="text-danger">{{$errors->has('task_name') ? $errors->first('task_name') : ' '}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Task Description</label>
                        <div class="col-md-9">
                            <textarea type="text" name="task_description" class="form-control" rows="5" cols="30"></textarea>
                            <span class="text-danger">{{$errors->has('task_description') ? $errors->first('task_description') : ' '}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Task Status</label>
                        <div class="col-md-9 radio">
                            <label><input type="radio" name="task_status" value="1" >Complete</label>
                            <label><input type="radio" name="task_status" value="0" checked>Incomplete</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

