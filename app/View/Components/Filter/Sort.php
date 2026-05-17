<?php

namespace App\View\Components\Filter;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Enums\Sorting;

class Sort extends Component
{
    public $options; 
    public function __construct()
    {
        $this->options = Sorting::cases(); 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter.sort');
    }
}
