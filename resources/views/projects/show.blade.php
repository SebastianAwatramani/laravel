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
                <li>Task: {{ $task->description }}</li>
            @endforeach

        </div>
    @endif
    <div>
        <p><a href="/projects/{{ $project->id }}/edit">Edit Project</a></p>
    </div>
@endsection