<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskReminder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreRequest $request)
    {
        // Get validated data
        $validated = $request->validated();

        // Convert the start time to the application's timezone
        $validated['start_time'] = Carbon::parse($request->input('start_time'))
            ->timezone(config('app.timezone')) // Convert it to the local timezone
            ->format('H:i:s'); // Ensure it’s formatted correctly

        // Create the task with the validated data
        $task = Task::create([
            'user_id' => Auth::id(),
            'is_complete' => false,
            'start_time' => $validated['start_time'],
            ...$validated,
        ]);

        return redirect()->back()->with('success', 'Task Added Successfully');
    }

    /**
     * Display the specified resource.
     */

    public function edit(string $id)
    {
        $task = Task::findOrfail($id);
        if ($task->user_id !== Auth::id()) {
            abort(403, 'You are not allowed to perform this action');
        }
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $task = Task::findOrFail($id);

        if ($task->user_id !== Auth::id()) {
            abort(403, 'You are not allowed to perform this action');
        }

        $updateValidated = $request->validated();

        $task->update($updateValidated);

        return redirect()->route('tasks')->with('success', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        if ($task->user_id !== Auth::id()) {
            abort(403, 'You are not allowed to perform this action');
        }

        $task->delete();
        return redirect()->back()->with('success', 'Task deleted successfully');
    }

    public function markComplete($id)
    {
        $task = Task::findOrFail($id);
        if ($task->user_id !== Auth::id()) {
            abort(403, 'You are not allowed to perform this action');
        }

        $task->update(['is_complete' => true]);
        return redirect()->back()->with('sucess', 'Task marked as complete.');
    }
    public function sendTaskNotification()
    {
        $tasks = Task::where('day_from', now()->toDateString())
            ->where('start_time', '>=', now()->addMinutes(30)->toTimeString())
            ->get();

        foreach ($tasks as $task) {
            $user = $task->user;
            $user->notify(new TaskReminder($task));
        }
    }

}
