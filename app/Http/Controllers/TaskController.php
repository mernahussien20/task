<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Services\TaskService;
use App\Repositories\TaskRepository;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;
use App\Jobs\UpdateStatistics as JobsUpdateStatistics;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getTasks(10);
        return view('backend.tasks.index', compact('tasks'));
    }

    public function create()
    {
        // الحصول على قائمة المستخدمين والمشرفين
        $admins = User::where('role', 'admin')->get();
        $users = User::where('role', 'user')->get();

        // تمرير البيانات إلى العرض
        return view('backend.tasks.create', compact('admins', 'users'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'assigned_to_id' => 'required|exists:users,id',
            'assigned_by_id' => 'required|exists:users,id',
        ]);

        $task = Task::create($request->all());

    // Dispatch the job to update statistics
       JobsUpdateStatistics::dispatch($task);
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $task = $this->taskService->getTaskById($id);

    $users = User::all();
    $admins = User::where('role', 'admin')->get();

    return view('backend.tasks.edit', compact('task', 'users', 'admins'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
          'title' => 'required|string',
            'description' => 'required|string',
            'assigned_to_id' => 'required|exists:users,id',
            'assigned_by_id' => 'required|exists:users,id',
        ]);

        $this->taskService->updateTask($id, $validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->taskService->deleteTask($id);

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
