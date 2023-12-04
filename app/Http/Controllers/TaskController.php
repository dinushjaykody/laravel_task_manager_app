<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\User;

/**
 * Class TaskController
 *
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{

    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        // user authentication check.
        $this->middleware('auth');
    }

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

    /**
     * Show the form to assign user to a task.
     *
     * @param Task $task
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function assign(Task $task)
    {
        $users = User::all(); // Retrieve all users
        return view('tasks.assign', compact('task', 'users'));
    }

    /**
     * Assign users to a task.
     *
     * @param Request $request
     *
     * @param Task $task
     *
     * @return $this
     */
    public function assignUser(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'assigned_user' => 'required|exists:users,id',
        ]);

        $user = User::find($validatedData['assigned_user']);

        if ($user) {
            $task->assigned_to = $user->id;
            $task->save();

            return redirect()->route('tasks.index')->with('success', 'User assigned to the task successfully!');
        }

        return redirect()->back()->with('error', 'Failed to assign user to the task.');
    }

}
