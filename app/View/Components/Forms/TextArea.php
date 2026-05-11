<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    public String $textAreaId;
    public String $textAreaTitle;
    /**
     * Create a new component instance.
     */
    public function __construct($textAreaId, $textAreaTitle)
    {
        $this->textAreaId = $textAreaId;
        $this->textAreaTitle = $textAreaTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.text-area');
    }
}
