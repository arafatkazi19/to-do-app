<?php

namespace ToDoApp;

use Illuminate\Database\Eloquent\Model;
use ToDoApp\User;

class Task extends Model
{
    //
    protected $fillable = ['task_name','task_description','task_status','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
