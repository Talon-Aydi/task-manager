<?php

namespace App\View\Components\Tasks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category; 
use App\Enums\TaskStatus; 

class Form extends Component
{
    public array $states; 
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->states = TaskStatus::cases();
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tasks.form');
    }
}
