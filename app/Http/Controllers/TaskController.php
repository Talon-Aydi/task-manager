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
        $states = CollectionFormatter::formatCollection(TaskStatus::cases());
        $categories = CollectionFormatter::formatCollection(Category::all(), 'id', 'name');

        return view('tasks.create', [
            'states' => $states,
            'categories' => $categories,
        ]);
    }

    public function store(TaskRequest $request): RedirectResponse 
    {
        $validated = $request->validated();
        Task::create($validated); 

        return redirect()->route('tasks.overview')->with('success', 'Taak aangemaakt');
    }
}
