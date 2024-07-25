@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Task Details</h1>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" value="{{ $task->title }}" readonly>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" readonly>{{ $task->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="due_date" class="form-label">Due Date</label>
        <input type="text" class="form-control" id="due_date" value="{{ $task->due_date }}" readonly>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" value="{{ $task->status }}" readonly>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">File</label>
        @if($task->file_path)
        <a href="{{ Storage::url($task->file_path) }}" class="form-control" id="file">Download File</a>
        @else
        <input type="text" class="form-control" id="file" value="No file uploaded" readonly>
        @endif
    </div>
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back</a>
</div>
@endsection