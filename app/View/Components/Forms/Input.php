<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public String $inputLabel;
    public String $inputType;
    public String $inputId;
    public String $inputPlaceholder;
    /**
     * Create a new component instance.
     */
    public function __construct($inputLabel, $inputType, $inputId, $inputPlaceholder)
    {
        $this->inputLabel = $inputLabel; 
        $this->inputType = $inputType; 
        $this->inputId = $inputId; 
        $this->inputPlaceholder = $inputPlaceholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}
