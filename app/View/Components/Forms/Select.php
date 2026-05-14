<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use UnitEnum;

class Select extends Component
{

    public function __construct(
        public Collection $options, 
        public string $labelName = 'Label',
        public string $inputName = 'name',
        public $value = '')
    {
    }

    public function render(): View
    {
        return view('components.forms.select');
    }
}
