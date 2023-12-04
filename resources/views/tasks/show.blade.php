@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 text-center">Task Details</h5>
                <p class="card-text">Task Title: {{$task->title}}</p>
                <p class="card-text">Task Description: {{$task->description}}</p>
                <p class="card-text">Task Status: {{$task->completion_status ? 'Completed' : 'Not Completed'}}</p>
                <p class="card-text">Task Created At: {{$task->created_at}}</p>
            </div>
        </div>
    </div>
@endsection