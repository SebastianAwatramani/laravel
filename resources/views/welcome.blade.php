<!-- -->

@extends('layout')

@section('title')

@endsection


@section('content')
    <h1 class="title is-1">My {{ $foo }} Page</h1>

    {{--could use a foreach() : / endforeach here, but blade makes this a little more elegant--}}
    {{--See also https://stackoverflow.com/questions/2020445/what-does-mean-in-php for shorthand echo--}}
    {{--However, this longform php is unnecessary with Blade.  Instead we can--}}

    {{--$tasks is being passed from the routes/web.php file--}}
    <ul class="box">
        @foreach($tasks as $task)

            {{--One way to simply echo the task would be to use the echo shorthand, but instead we can make it even shorter with the Blade mustache syntax--}}

            <li>{{ $task }}</li>
        @endforeach
    </ul>


@endsection

