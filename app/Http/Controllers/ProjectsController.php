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

    public function show()

    {

    }

    public function edit($id) //projects/{project}/edit
        //Because this was setup as wildcard in the routing, Laravel will pass it.  e.g. /projects/1/edit, the 1 is passed as method argument
        //Does not seem to matter what it is named.  Returns ["1"]
    {

        $project = Project::FindorFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update($id)

    {
        //dd() = die and dump.  Good for debugging
        //dd(request()->all());

        $project = Project::find($id);

        $project->title = request('title');
        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }

    public function destroy($id)

    {
        Project::Find($id)->delete();

        return redirect('/projects');

    }


}
