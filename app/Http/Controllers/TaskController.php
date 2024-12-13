<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=> 'required|string',
            'description'=> 'string|nullable',
            'day_from'=> 'required|date',
            'day_to'=> 'required|date',
        ]);

        $tasks = Task::create([
            'user_id'=> Auth::id(),
            'title'=> $validated['title'],
            'description'=> $validated['description'],
            'day_from'=> $validated['day_from'],
            'day_to'=> $validated['day_to'],
            'is_complete'=> false

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
    public function update(Request $request, string $id)
    {
        $task = Task::findOrfail($id);
        if($task->user_id !== Auth::id()){
            abort(403, 'You are not allowed to perform this action');
        }

        $validated = $request->validate([
            'title'=> 'required|string',
            'description'=> 'string|nullable',
            'day_from'=> 'required|date',
            'day_to'=> 'required|date',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks')->with('success', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
