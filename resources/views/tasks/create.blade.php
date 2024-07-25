
@extends('layouts.app')

<style>
    /* Container styles */
.container {
    max-width: 600px;
    margin: 40px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.container:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Heading styles */
h1 {
    font-size: 100rem;
    margin-bottom: 20px;
    text-align: center;
    color: #333;
    font: bold;
}

/* Form control styles */
.form-label {
    font-weight: bold;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

.form-control {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 12px 15px;
    font-size: 1rem;
    transition: all 0.3s ease-in-out;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    outline: none;
}

/* Margin bottom for form group */
.mb-3 {
    margin-bottom: 1.5rem;
}

/* Button styles */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    padding: 12px 20px;
    font-size: 1.1rem;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s, border-color 0.3s;
    display: block;
    width: 100%;
    text-align: center;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

/* File input styles */
.form-control[type="file"] {
    padding: 8px;
}

#status{
    width: 120;
    padding: 20px
}


/* Add some subtle animation */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.container {
    animation: fadeIn 1s ease-in-out;
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
</div>file{
    padding: 20;

}
@endsection