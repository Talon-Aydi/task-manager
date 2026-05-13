<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use UnitEnum;

class Select extends Component
{
    public Collection $options;

    public function __construct(
        $options, 
        public string $labelName = 'Label',
        public string $inputName = 'name')
    {
        $this->labelName = $labelName;
        $this->inputName = $inputName; 
        $this->options = $options;
    }

    public function render(): View
    {
        return view('components.forms.select');
    }
}
