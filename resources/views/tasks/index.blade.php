@extends('layouts.app')

@section('content')
<div class="container">
        <button type="button" class="btn btn-success">Create Tasks +</button>
        <div class="row">
           
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->due_date }}</td>
                            <td>{{ $task->status }}</td>
                            <td>
                                <button type="button" class="btn btn-danger">Delete</button>
                                <button type="button" class="btn btn-primary">Edit</button>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            
                  
              </table>
        </div>
    </div>
@endsection