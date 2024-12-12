<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;
use App\Trait\AuthCheckTrait;

class TaskController extends Controller
{
    use AuthCheckTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->authCheck();
        if($response) return $response;

        $tasks = Task::where('user_id', Auth::id())->get();
        return view('task.index', compact('tasks'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = $this->authCheck();
        if($response) return $response;

        return view('task.add-task');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $response = $this->authCheck();
        if($response) return $response;

        $fields = $request->validate([
            'title' => 'required|max:200',
        ]);

        $fields['user_id'] = Auth::user()->id;

        Task::create($fields);

        return redirect()->route('task.index')->with('success', 'Task added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $response = $this->authCheck();
        if($response) return $response;

        if(Gate::denies('manage-task', $task)) {
            abort(403);
        }
        return view('task.update-task', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $response = $this->authCheck();
        if($response) return $response;

        $fields = $request->validate([
            'title' => 'required|max:200',
        ]);

        $task->update($fields);

        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $response = $this->authCheck();
        if($response) return $response;

        if(Gate::denies('manage-task', $task)) {
            abort(403);
        }

        $task->delete();

        return redirect()->route('task.index')->with('success', 'Task deleted successfully.');
    }

}
