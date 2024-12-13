@extends('includes.layout')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')


    <div class="mb-3">
        Title<input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
            name="title"  value="{{ $task->title }}">
        <div class="invalid-feedback">
            @error('title')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="mb-3">
        Description
        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" > {{ $task->description }}</textarea>
        <div class="invalid-feedback">
            @error('description')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="mb-3">
        Day From<input type="date" id="dayFrom" name="day_from"
            class="form-control @error('day_from') is-invalid @enderror"  value="{{ $task->day_from }}">
        <div class="invalid-feedback">
            @error('day_from')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="mb-3">
        Day To<input type="date" id="dayTo" name="day_to"
            class="form-control @error('day_to') is-invalid @enderror"  value="{{ $task->day_to }}">
        <div class="invalid-feedback">
            @error('day_to')
                {{ $message }}
            @enderror
        </div>
    </div>
    <button type="submit" id="addTask" name="submit" class="btn btn-primary">Add Task</button>
</form>
<br>
@endsection
