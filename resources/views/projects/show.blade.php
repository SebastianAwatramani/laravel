@extends('layout')

@section('title')
    Projects Page
@endsection

@section('content')
    <div class="box">
        <h1 class="title">{{ $project->title }}</h1>

        <div class="content">{{ $project->description }}</div>
        @if($project->tasks->count())
            <div>
                @foreach($project->tasks as $task)
                    {{--Note that each form is separate--}}
                    <form method="POST" action="/completed-tasks/{{ $task->id }}" class="box">
                        {{--@method("PATCH")--}}
                        @csrf

                        @if($task->completed)
                            @method("DELETE")
                        @endif

                        <label for="completed" class="checkbox">
                            <input type="checkbox" name="completed"
                                   onchange="this.form.submit()" {{$task->completed ? "checked" : ""}}>
                            {{ $task->description }}
                        </label>
                    </form>


                @endforeach

            </div>
        @endif
    </div>
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
        @can('view', $project)
            <p><a href="/projects/{{ $project->id }}/edit">Edit Project</a></p>
    </div>
        @endcan
@endsection