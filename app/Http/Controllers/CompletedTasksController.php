<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;


class CompletedTasksController extends Controller
{
    //When it doubt, create a new controller and return to REST

    public function store(Task $task)
    {
        $task->complete();

        return back();
    }

    public function destroy(Task $task)
    {
        $task->incomplete();

        return back();
    }
}
