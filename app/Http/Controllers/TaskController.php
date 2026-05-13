<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TaskRequest; 
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function show(): View
    {
        return view('tasks.overview');
    }

    public function store(TaskRequest $request): RedirectResponse 
    {
        $validated = $request->validated();
        Task::create($validated); 

        return redirect()->route('tasks.overview')->with('success', 'Taak aangemaakt');
    }
}
