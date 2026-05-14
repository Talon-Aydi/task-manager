<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{

    public function __construct(
        public string $inputLabel,
        public string $inputType,
        public string $inputId,
        public ?string $value = ''
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}
