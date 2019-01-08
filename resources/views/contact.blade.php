
@extends('layout')

@section('title')
    Contact Page
@endsection
@section('content')

    <h1>Contact Form</h1>

    @foreach($tasks as $task)
    {{$task}}
    @endforeach

@endsection
