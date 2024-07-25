<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = auth()->user()->tasks;
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'descrption' => 'nullable|string',
            'due_date' => 'nullable|string',
            'status' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif'
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description ?? '';
        $task->due_date = $request->due_date;
        $task->status = $request->status;
        $task->user_id = auth()->id();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('tasks', $filename);
            $task->file_path = $path;
        }
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif'
        ]);

        $task->title = $request->title;
        $task->description = $request->description ?? '';
        $task->due_date = $request->due_date;
        $task->status = $request->status;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('tasks', $filename);
            $task->file_path = $path;
        }

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
