@extends('layout')

@section('title')
    Projects Page
@endsection

@section('content')
    <h1>{{ $project->title }}</h1>

    <div class="content">{{ $project->description }}</div>
    <div>
        <p><a href="/projects/{{ $project->id }}/edit">Edit Project</a></p>
    </div>
@endsection