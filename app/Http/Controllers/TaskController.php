<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
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

    public function store(TaskRequest $request): RedirectResponse 
    {
        $validated = $request->validated();
        Task::create($validated); 

        return redirect()->route('tasks.overview')->with('success', 'Taak aangemaakt');
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
