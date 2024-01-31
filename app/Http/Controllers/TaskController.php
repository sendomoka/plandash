<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response($tasks, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => Rule::in(['completed', 'incomplete']),
        ]);
        $task = Task::create($validated);
        return response($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return response($task, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $task = Task::findOrFail($id);
        $validated = $request->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'status' => Rule::in(['completed', 'incomplete']),
        ]);
        $task->update($validated);
        return response($task, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response(null, 204);
    }

    /**
     * Mark the specified resource as complete.
     */
    public function complete()
    {
        $tasks = Task::where('status', 'completed')->get();
        return response($tasks, 200);
    }

    /**
     * Mark the specified resource as incomplete.
     */
    public function incomplete()
    {
        $tasks = Task::where('status', 'incomplete')->get();
        return response($tasks, 200);
    }

    public function updateStatus($id, Request $request)
    {
        $task = Task::findOrFail($id);
        $validated = $request->validate([
            'status' => Rule::in(['completed', 'incomplete']),
        ]);
        $task->update($validated);
        return response($task, 200);
    }
}
