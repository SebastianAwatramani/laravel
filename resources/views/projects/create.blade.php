@extends('layout')

@section('title')
    Create a project
@endsection

@section('content')
    <h1>Create a new Project</h1>

    <form action="/projects" method='POST'>
        {{--csrf_field() required to avoid 419 error when submitting form--}}
        {{csrf_field()}}
        <div>
            <input type="text" name="title" placeholder="Project Title">
        </div>
        <div>
            <textarea name="description" id="" cols="30" rows="10" placeholder="Project Description">

            </textarea>
        </div>
        <div>
            <button type="submit">Create Project</button>
        </div>
    </form>

@endsection