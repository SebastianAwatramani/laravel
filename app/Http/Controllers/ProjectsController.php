<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Because I use use App\Projects, I can call Project::all() without prefixing it with App\

use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        //Starting this with a backslash (\App\Project:all()) means that it starts at root.


        //Assigns json from the db to $projects
        $projects = Project::all();

//        return $projects;

        //This  will look in resources/views/projects/index.blade.php
        return view('projects.index', compact('projects'));
    }
    public function create()
    {
        return view('projects.create');
    }
    public function store()
    {
        $project = new Project();

        $project->title = request('title');
        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }
}
