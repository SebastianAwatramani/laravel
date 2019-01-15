<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Task;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $project->addTask(request()->validate(['description' => 'required']));

        return back();
    }

    /*
     * Now using CompletedTasksController() to take care completing tasks, so the following is no longer necessary (but still cool)
     *
     * */

//    public function update(Task $task)
//    {
////        $task->complete(request()->has('completed'));
//
//        //Alternative with dynamic method call (!)
//        //This is really cool. Will select which method to use based on input.  Makes it more readable.  See Task.php
//        //NOTE: I am using a second $ sign here to signify I am refering to a local var and not a method in Task()
//        $method = request()->has('completed') ? 'complete' : 'incomplete';
//
//        $task->$method();
//
//        return back();
//    }
}
