@extends('layouts.app')

<style>
    /* Container */
.container {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    background-color: #f8f9fa;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Title */
.container h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 2rem;
    color: #343a40;
}

/* Form */
form {
    display: flex;
    flex-direction: column;
}

/* Form Labels */
.form-label {
    font-weight: bold;
    color: #495057;
}

/* Form Controls */
.form-control {
    border-radius: 4px;
    border: 1px solid #ced4da;
    padding: 10px;
    font-size: 1rem;
}

/* Form Controls Focus */
.form-control:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* Textarea */
textarea.form-control {
    resize: vertical;
    min-height: 100px;
}

/* Submit Button */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    padding: 10px 20px;
    font-size: 1rem;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 20px;
    transition: background-color 0.3s, border-color 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

/* Centered Submit Button */
form .text-center {
    text-align: center;
}

/* File Input */
input[type="file"] {
    padding: 3px;
}

/* Media Query for Mobile Responsiveness */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }
    .btn-primary {
        width: 100%;
    }
}
</style>
@section('content')
<div class="container">
    <h1>Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" id="due_date">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" id="status" required>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input type="file" name="file" class="form-control" id="file">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection