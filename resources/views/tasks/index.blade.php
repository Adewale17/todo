@extends('includes.layout')
@section('content')

    <body>
        <div class="container mt-5">
            <h2 class="mb-4 " style="text-align: center">My Tasks</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form id="taskForm" action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    Title<input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                        name="title">
                    <div class="invalid-feedback">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    Description
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                    <div class="invalid-feedback">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    Day From<input type="date" id="dayFrom" name="day_from"
                        class="form-control @error('day_from') is-invalid @enderror">
                    <div class="invalid-feedback">
                        @error('day_from')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    Day To<input type="date" id="dayTo" name="day_to"
                        class="form-control @error('day_to') is-invalid @enderror">
                    <div class="invalid-feedback">
                        @error('day_to')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <button type="submit" id="addTask" name="submit" class="btn btn-primary">Add Task</button>
            </form>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="taskTable">
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->day_from }}</td>
                            <td>{{ $task->day_to }}</td>
                            <td>{{ $task->is_complete ? 'Complete' : 'In Progress' }}</td>
                            <td class="action-buttons">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    @if ($task->is_complete == false)
                                        <button type="submit" class="btn btn-success btn-sm">Mark Complete</button>
                                    @else
                                        <button type="submit" class="btn btn-success btn-sm" disabled>Complete</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
