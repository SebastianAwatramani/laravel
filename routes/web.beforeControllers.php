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



Route::get('/', function () {

    $tasks = [
        'go to store',
        'go to market',
        'go to work'
    ];
    return view('welcome', [
        'tasks' => $tasks, //Gives the welcome view a variable, tasks

        'foo' => request('title') //Will grab from query string.  Note the lack of $ - request is a method? of some sort (helper global function)
        //Note: this data is escaped, whether taken from query string or inserted here.  e.g. <script> will actually print and not execute.
        //Can JS be injected on purpose?
        //Indeed.  By using {{!! $var !!}} in the view

        //A short hand version of all the above would be

        //return view('welcome')->withTasks($tasks)->withFoo('foo');
    ]);
});

Route::get('/contact', function() {

    //Here is yet another way to pass vars

    return view('contact')->with([
        'foo' => 'bar',
        'tasks' => [
            'go to store',
            'go to market',
            'go to work'
        ]
    ]);
});

Route::get('/about', function () {
    return view('about');
});

//Passing Data to views

