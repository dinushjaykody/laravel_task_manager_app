<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

/**
 * Class TaskController
 *
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * Display list of Tasks.
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(10);
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new Task.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a new Task.
     *
     * @param TaskRequest $request
     *
     * @return $this
     */
    public function store(TaskRequest $request)
    {
        // Validate with Task Request. If validation passed, continue to store the task.

        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->completion_status = $request->input('completion_status');

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display Task details.
     *
     * @param Task $task
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing a Task.
     *
     * @param Task $task
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }


    /**
     * Update a Task.
     *
     * @param TaskRequest $request
     *
     * @param Task $task
     *
     * @return $this
     */
    public function update(TaskRequest $request, Task $task)
    {
        // Validate with Task Request. If validation passed, continue to store the task.

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Delete a Task.
     *
     * @param Task $task
     *
     * @return $this
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');

    }
}
