<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TaskRequest; 
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category; 
use App\Enums\TaskStatus; 
use App\Utils\Formatter\CollectionFormatter;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::all();
        return view('tasks.overview', [
            'tasks' => $tasks,
        ]);
    }

    public function create(): View
    {
        return $this->renderFormView(new Task()); 
    }

    public function edit($taskId): View 
    {
        $task = Task::findOrFail($taskId); 
        return $this->renderFormView($task);
    }

    public function store(TaskRequest $request)
    {
        DB::transaction(fn() => Task::create($request->validated()));
    }

    public function update(TaskRequest $request, Task $task)
    {   
        $task->update($request->validated());
    }

    public function delete(Task $task)
    {
        DB::transaction(fn() => $task->delete(), attempts: 3);
    }

    public function renderFormView($task = null): View 
    {
        $states = CollectionFormatter::formatCollection(TaskStatus::cases());
        $categories = CollectionFormatter::formatCollection(Category::all(), 'id', 'name');

        return view('tasks.form', [
            'states'        => $states,
            'categories'    => $categories,
            'task'          => $task,
        ]);
    }
}
