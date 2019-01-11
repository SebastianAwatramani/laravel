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
                    <input type="checkbox" name="completed" onchange="this.form.submit()" {{$task->completed ? "checked" : ""}}>
                </form>

                <li>Task: {{ $task->description }}</li>
            @endforeach

        </div>
    @endif
    <div>
        <p><a href="/projects/{{ $project->id }}/edit">Edit Project</a></p>
    </div>
@endsection