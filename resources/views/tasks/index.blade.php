@extends('layouts.app')
@section('title', 'The List Of Tasks')

@section('content')
    <div>
        <a class="btn btn-success"
           href="{{ route('tasks.create') }}"> Create Task
        </a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(count($tasks))
            <div class="table-responsive">
                <table class="table table-stripped">
                    <thead class="thead-light">
                    <th>Task ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Task Assigned To</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->completion_status ? 'Completed' : 'Not Completed' }}</td>
                            <td>
                                @if ($task->assignedUser)
                                    {{ $task->assignedUser->name }}
                                @else
                                    No User Assigned
                                @endif

                                <div>
                                    <a href="{{ route('tasks.assign', ['task' => $task->id]) }}">Assign User</a>
                                </div>

                            </td>
                            <td>
                                <a class="btn btn-link"
                                   href="{{ route('tasks.show', ['task' => $task]) }}"> Show
                                </a>

                                <a class="btn btn-link"
                                   href="{{ route('tasks.edit', ['task' => $task]) }}"> Edit
                                </a>

                                <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link"> Delete </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $tasks->links('vendor.pagination.custom') }}
            </div>
        @else
            <div class="alert alert-warning"> There are no tasks</div>
        @endif
    </div>
@endsection
