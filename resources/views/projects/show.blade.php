@extends('layout')

@section('title')
    Projects Page
@endsection

@section('content')
    <h1>{{ $project->title }}</h1>

    <div class="content">{{ $project->description }}</div>
    @if($project->tasks->count())
        <div>
            @foreach($project->tasks as $task)
                {{--Note that each form is separate--}}
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @method("PATCH")
                    @csrf
                    <label for="completed" class="checkbox"></label>
                    <input type="checkbox" name="completed"
                           onchange="this.form.submit()" {{$task->completed ? "checked" : ""}}>
                </form>

                <li>Task: {{ $task->description }}</li>
            @endforeach

        </div>
    @endif

    <form class="box" action="/projects/{{ $project->id }}/tasks" method="POST">
        @csrf
        <div class="field">
            <h1>New Task</h1>

            <div class="control">
                <input type="text" class="input" name="description" placeholder="Task Title">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>
            </div>
        </div>
    </form>
    @include('errors')
    <div>
        <p><a href="/projects/{{ $project->id }}/edit">Edit Project</a></p>
    </div>
@endsection