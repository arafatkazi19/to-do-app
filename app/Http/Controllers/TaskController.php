<?php

namespace ToDoApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ToDoApp\Task;
use ToDoApp\User;

class TaskController extends Controller
{
    //
    public function addTask(){
        return view('users.task.add-task');
    }

    public function saveTask(Request $request){
        $this->validate($request,[
            'task_name' => 'required|min:4',
            'task_description' => 'required|max:50',
            'task_status' => 'required',
        ]);

        $task = new Task();
        $task->task_name = $request->task_name;
        $task->task_description = $request->task_description;
        $task->task_status = $request->task_status;
        $task->user_id = auth()->id();
        $task->save();

        return redirect('/add-task')->with('message','Task Added Successfully');
    }

    public function manageTask(Task $task){
        //$tasks = Task::all();

        $tasks = auth()->user()->tasks;

        return view('users.task.manage-task',['tasks'=>$tasks]);
    }

    public function editTask($id){
        $task = Task::find($id);
        return view('users.task.edit-task',['task'=>$task]);
    }

    public function updateTask(Request $request){
        $task = Task::find($request->id);
        $task->task_name = $request->task_name;
        $task->task_description = $request->task_description;
        $task->task_status = $request->task_status;
        $task->save();

        return redirect('/manage-task')->with('message','Task Updated Successfully');
    }

    public function taskIncomplete($id){
        $task = Task::find($id);
        $task->task_status = 0;
        $task->save();

        return redirect('/manage-task');
    }

    public function taskComplete($id){
        $task = Task::find($id);
        $task->task_status = 1;
        $task->save();

        return redirect('/manage-task');
    }

    public function deleteTask($id){
        $task = Task::find($id);
        $task->delete();

        return redirect('/manage-task')->with('message','Task Deleted Successfully');

    }
}
