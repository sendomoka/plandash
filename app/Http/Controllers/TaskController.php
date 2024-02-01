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
        $data = Task::all();
        return view('tasks.index', compact('data'));
    }

    public function indexApi()
    {
        $api = Task::all();
        return response($api, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        Task::create($data);
        return redirect()->to('tasks')->with('success', 'Task created successfully');
    }

    public function storeApi(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        Task::create($data);
        return response($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Task::where('id', $id)->get();
        return view('tasks.index', compact('data'));
    }

    public function showApi(string $id)
    {
        $api = Task::where('id', $id)->get();
        return response($api, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Task::where('id', $id)->first();
        return view('tasks.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];
        Task::where('id', $id)->update($data);
        return redirect()->to('tasks')->with('success', 'Task updated successfully');
    }

    public function updateApi(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];
        Task::where('id', $id)->update($data);
        return response($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::where('id', $id)->delete();
        return redirect()->to('tasks')->with('success', 'Task deleted successfully');
    }

    public function destroyApi(string $id)
    {
        Task::where('id', $id)->delete();
        return response(null, 204);
    }

    /**
     * Mark the specified resource as complete.
     */
    public function completed()
    {
        $data = Task::where('status', '=', 'Completed')->get();
        return view('tasks.index', compact('data'));
    }

    public function completedApi()
    {
        $api = Task::all();
        return response($api, 200);
    }

    /**
     * Mark the specified resource as incomplete.
     */
    public function incomplete()
    {
        $data = Task::where('status', '=', 'Incomplete')->get();
        return view('tasks.index', compact('data'));
    }

    public function incompleteApi()
    {
        $api = Task::where('status', '=', 'Incomplete')->get();
        return response($api, 200);
    }

    public function updateStatus(Request $request, string $id)
    {
        $data = [
            'status' => $request->input('status')
        ];
        Task::where('id', $id)->update($data);
        return redirect()->to('tasks')->with('success', 'Task status updated successfully');
    }

    public function updateStatusApi(Request $request, string $id)
    {
        $data = [
            'status' => $request->input('status')
        ];
        Task::where('id', $id)->update($data);
        return response($data, 200);
    }
}
