<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TaskRequest; 
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\View\View;
use App\Models\Category; 
use App\Enums\TaskStatus; 

class TaskController extends Controller
{   
    public function index(Request $request): View|Response
    {
        $tasks = Task::applySorting($request->query('sort'))->get(); 

        if ($request->ajax()) {
            return response(
                view('tasks.task-index', compact('tasks'))->fragment('task-list')
            );
        }

        return view('tasks.task-index', compact('tasks'));
    }

    public function create(): View
    {
        return view('tasks.task-form', [
            'states'     => TaskStatus::asSelectOptions(),
            'categories' => Category::asSelectOptions(),
            'isEdit'     => false,
        ]);
    }

    public function edit(Task $task): View 
    {
        return view('tasks.task-form', [
            'task'       => $task,
            'states'     => TaskStatus::asSelectOptions(),
            'categories' => Category::asSelectOptions(),
            'isEdit'     => true,
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
