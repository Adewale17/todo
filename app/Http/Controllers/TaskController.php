<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validate();

        $tasks = Task::create([
            'user_id'=> Auth::id(),
            'is_complete'=> false,
            ...$validated

        ]);
        return redirect()->back()->with('success', 'Task Added Successfully');
    }

    /**
     * Display the specified resource.
     */

    public function edit(string $id)
    {
        $task = Task::findOrfail($id);
        if($task->user_id !== Auth::id()){
            abort(403, 'You are not allowed to perform this action');
        }
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $task = Task::findOrfail($id);
        if($task->user_id !== Auth::id()){
            abort(403, 'You are not allowed to perform this action');
        }

        $validated = $request->validate();

        $task->update($request->all());
        return redirect()->route('tasks')->with('success', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        if($task->user_id !== Auth::id()){
            abort(403, 'You are not allowed to perform this action');
        }

        $task->delete();
        return redirect()->back()->with('success', 'Task deleted successfully');
    }

    public function markComplete($id){
        $task = Task::findOrFail($id);
        if($task->user_id !== Auth::id()){
            abort(403, 'You are not allowed to perform this action');
        }

        $task->update(['is_complete'=>true]);
        return redirect()->back()->with('sucess', 'Task marked as complete.' );
    }
}
