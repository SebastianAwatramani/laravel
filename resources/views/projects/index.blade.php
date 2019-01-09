@extends('layout')

@section('title')
    Projects Page
@endsection

@section('content')
    <h1>Projects</h1>
    @foreach($projects as $project)
        {{$project->title}}
        <br>
    @endforeach
    <a href="/projects/create">Create a Project</a>
@endsection