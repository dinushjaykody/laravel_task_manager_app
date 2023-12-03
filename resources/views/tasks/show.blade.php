@extends('layouts.app')
@section('title', $task->title)

@section('content')
    <p>{{$task->title}}</p>
    <p>{{ $task->description }}</p>
    <p>{{ $task->completion_status }}</p>
    <p>{{$task->created_at}}</p>
@endsection