<?php

namespace App\View\Components\Tasks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category; 
use App\Enums\TaskStatus; 
use App\Utils\Formatter\CollectionFormatter;

class Form extends Component
{
    public $states; 
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->states = CollectionFormatter::formatCollection(TaskStatus::cases());
        $this->categories = CollectionFormatter::formatCollection(Category::all(), 'id', 'name');
        dd($this->categories);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tasks.form');
    }
}
