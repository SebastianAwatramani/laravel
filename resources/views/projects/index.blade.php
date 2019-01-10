@extends('layout')

@section('title')
    Projects Page
@endsection

@section('content')
    <h1>Projects</h1>
    <ul>
        @foreach($projects as $project)
            <a href="projects/{{ $project->id }}">{{ $project->title }}</a>
            <br>
        @endforeach
    </ul>
    <a href="/projects/create">Create a Project</a>
@endsection