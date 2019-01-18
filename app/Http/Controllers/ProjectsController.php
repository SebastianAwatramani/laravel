<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreated;
use Illuminate\Http\Request;

//Because I use use App\Projects, I can call Project::all() without prefixing it with App\

use App\Project;

class ProjectsController extends Controller
{
    public function __construct()
    {
        /*
         *
         * This is one way to force authorization.  However, if I do it here, then it applies to every route.  Do I need it for every route?
         * Will depend on the page in question
         * The alternative is to do it in the route, or to use middleware()->only()
         * e.g. $this->middleware('auth')->only(['store', 'update']);
         * There is also middleware()->except([...])
         *
         * */

        $this->middleware('auth');
    }

    public function index()

    {
        //Starting this with a backslash (\App\Project:all()) means that it starts at root.

        //Assigns json from the db to $projects
//        $projects = Project::all();

        auth()->id(); //Null if guest, id if signed in
        auth()->user(); //returns user instance
        auth()->check(); //Boolean, true if user signed in
        auth()->guest(); //Bool, true if guest



        $projects = Project::where('owner_id', auth()->id())->get(); //Select * from projects where owner_id = [current user id]
        dump($projects);
        //This  will look in resources/views/projects/index.blade.php
        return view('projects.index', compact('projects'));
    }

    public function create()

    {
        return view('projects.create');
    }

    public function store()

    {
//        This passes all request data and so can throw a mass assignment error, because this can be a security risk
//        The solution is to add the desired fields to $fillable in the model

//        Short hand
//        Project::create([
//            'title' => request('title'),
//            'description' => request('description')
//        ]);


//        Validation
//        If validation fails, it redirects to previous page and sends through validation errors, which can be accessed through an errors variable
//        Assigning the response from request()->validate() returns an array with the validated data.  Can simply pass that into Project::create()

        $validate = request()->validate([
            'title' => ['required', 'min:3'], //could also use | here to separate requirements
            'description' => 'required'
    ]);

        $validate['owner_id'] = auth()->id();
//        Even better
//        And even better than this, could just wrap the above request in a Project::create() call and it would only take that one command
        $project = Project::create($validate);


        \Mail::to('sebastian.awatramani@gmail.com')->send(
            new  ProjectCreated($project)
        );

        return redirect('/projects');
    }

    public function show(Project $project)

    {
        /*
         *
         * AUTHORIZATION
         *
        */

//        if($project->owner_id !== auth()->id()) {
//            abort(403);
//        }
        //OR

        //abort_if($project->owner_id !== auth()->id(), 403);

        //OOP Approach

        //abort_unless(auth()-user()-owns($project), 404); //In this instance, we would create an owns method in User()

        //But instead, we'll use a POLICY approach
//      authorize($methodToCallInPolicy, $whatToSend);  User() is also in policy->view(), but that is passed through automatically
        $this->authorize('view', $project); //Looks like because of the mapping in AuthServiceProvider, this knows how to authorize

        //Here we are using a different method than passing $id and then using Project::FindorFail().
        //  Instead, we type hint with Project() and since we also have a wildcard, Laravel assumes we are trying to get a Project() with that ID
        //Can customize what Laravel looks for with ROUTE MODEL BINDING.  Override getRouteKeyName() method on the Eloquent model

        return view('projects.show', compact('project'));
    }

    public function edit($id) //projects/{project}/edit

    {
        //Because this was setup as wildcard in the routing, Laravel will pass it.  e.g. /projects/1/edit, the 1 is passed as method argument
        //Does not seem to matter what it is named.  Returns ["1"]
        $project = Project::FindorFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)

    {
        //dd() = die and dump.  Good for debugging

        //Short hand for update
        $project->update(request(['title', 'description']));

        //dd(request()->all());

//        $project->title = request('title');
//        $project->description = request('description');
//
//        $project->save();

        return redirect('/projects');
    }

    public function destroy(Project $project)

    {
        $project->delete();

        return redirect('/projects');

    }


}
