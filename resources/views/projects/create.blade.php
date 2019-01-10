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
            <input type="text" name="title" placeholder="Project Title"
                   class="input {{ $errors->has('title') ? 'is-danger' : ''}}" value="{{ old('title') }}">
        </div>
        <div>
            <textarea name="description" id="" cols="30" rows="10" placeholder="Project Description" class="textarea"
                      required></textarea>
        </div>
        <div>
            <button type="submit">Create Project</button>
        </div>

        @if ($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    </form>

@endsection