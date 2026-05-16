<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TaskRequest; 
use App\Models\Task;
use Illuminate\View\View;
use App\Models\Category; 
use App\Enums\TaskStatus; 

class TaskController extends Controller
{   
    public function index(): View
    {
        return view('tasks.overview', [
            'tasks' => Task::all(),
        ]);
    }

    public function create(): View
    {
        return view('tasks.form', [
            'states'     => TaskStatus::asSelectOptions(),
            'categories' => Category::asSelectOptions(),
        ]);
    }

    public function edit(Task $task): View 
    {
        return view('tasks.form', [
            'task'       => $task,
            'states'     => TaskStatus::asSelectOptions(),
            'categories' => Category::asSelectOptions(),
        ]);
    }

    public function store(TaskRequest $request)
    {
        Task::create($request->validated());
    }

    public function update(TaskRequest $request, Task $task)
    {   
        $task->update($request->validated());
    }

    public function delete(Task $task)
    {
        $task->delete();
    }
}
