<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
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
    }
    public function contact()
    {
        //Here is yet another way to pass vars

        return view('contact')->with([
            'foo' => 'bar',
            'tasks' => [
                'go to store',
                'go to market',
                'go to work'
            ]
        ]);
    }
    public function about()
    {
        return view('about');
    }
}
