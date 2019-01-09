@extends('layout')

@section('title')
    Create a project
@endsection

@section('content')
    <h1>Edit Project</h1>

    <div class="field">
        <form method="POST" action="/projects/{{ $project->id }}">
            {{--Since we are patching, we need to send a patch request, but HTML does not support anything but GET/POST--}}
            {{--So instead we will run a POST request, but will insert a Laravel helper method_field() to specific what kind of request we really want to make--}}
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <label class="field" for="title">Title</label>
            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
            </div>
            <div>
                <label for="description" class="label">Description</label>
                <textarea name="description" id="" cols="30" rows="10">{{ $project->description }}</textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection