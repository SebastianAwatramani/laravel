<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        //Starting this with a backslash means that it starts at root.  Could also do:
        //use App\Project and then just call Project::all()

        //Assigns json from the db to $projects
        $projects = \App\Project::all();

//        return $projects;

        //This  will look in resources/views/projects/index.blade.php
        return view('projects.index', compact('projects'));
    }
}
