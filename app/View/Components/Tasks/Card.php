<?php

namespace App\View\Components\Tasks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Task; 
use App\Enums\TaskStatus; 

class Card extends Component
{
    /**
     * Create a new component instance.
     */
    public $statusColor; 

    public function __construct(public Task $task)
    {
        $this->task = $task;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tasks.card');
    }
}
