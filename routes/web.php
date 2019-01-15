<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//use App\Repositories\UserRepository;
//
//Route::get('/', function(UserRepository $users) {
//    dd($users);
//});


//Working with a catch all controller
//Can generate with artisan make:contoller [name]

//@home refers to a method in the PagesContoller
Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');



/*
 * GET
 *  index
 *
 * POST
 *  store

 * PATCH
 *  Update /projects/1 - update a specific project with id of 1
 *
 * DELETE
 *  /projects/1 - destroy a project with id of 1
 */

//Working with specific projects

Route::get('/projects', 'ProjectsController@index');
Route::post('/projects', 'ProjectsController@store');
Route::get('/projects/create', 'ProjectsController@create');


//Show specific project
//GET project/x (show)
Route::get('/projects/{project}', 'ProjectsController@show');  //Wild card

//Edit project
Route::get('/projects/{project}/edit', "ProjectsController@edit"); //Will display a form to update the project

//Patch (analogous to store); used to handle the edit and perform the actual update

Route::patch('/projects/{project}', "ProjectsController@update");

//Delete

Route::delete("/projects/{project}", "ProjectsController@destroy");

//BUT HOLY SHIT! LARAVEL CAN TAKE CARE OF ALL OF THE ABOVE WITH A SIMPLE METHOD CALL

Route::resource('projects', 'ProjectsController');

//Task routes

//Update an existing task
//Route::patch('/tasks/{task}', 'ProjectTasksController@update');

//Create a new task
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

//Here we are going to switch up the way we deal with completing tasks.  Instead have created a new controller, CompletedTasksController()
Route::post('/completed-tasks/{task}', "CompletedTasksController@store");
Route::delete("/completed-tasks/{task}", "CompletedTasksController@destroy");



