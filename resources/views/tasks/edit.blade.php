@extends('layouts.app')

@section('title', 'Update Task')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('tasks.update', ['task' => $task]) }}">
                    @csrf
                    @method('PUT')

                    {{--start title--}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $task->title }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{--end title--}}

                    {{--start description--}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $task->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{--end description--}}

                    {{--start completion status--}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Status</label>
                        <select class="custom-select" name="completion_status" required="">
                            <option value= 1 {{$task->completion_status == 1 ? 'selected' : ''}}>
                                Completed
                            </option>
                            <option value= 0 {{$task->completion_status == 0 ? 'selected' : ''}}>
                                Not Completed
                            </option>
                        </select>
                    </div>
                    {{--end completion status--}}

                    <button type="submit" class="btn btn-primary">Update Task</button>
                </form>
            </div>
        </div>
    </div>

@endsection
