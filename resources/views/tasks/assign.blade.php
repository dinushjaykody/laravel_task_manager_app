@extends('layouts.app')

@section('title', 'Assigned Task To User')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('tasks.assignUser', ['task' => $task->id]) }}">
                    @csrf
                    <select name="assigned_user">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Assign User</button>
                </form>
            </div>
        </div>
    </div>
@endsection