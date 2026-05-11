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
        public string $labelName = 'label',
        public string $inputName = 'name',
        public string $idKey = 'id',
        public string $valueKey = 'value')
    {
        $this->labelName = $labelName;
        $this->inputName = $inputName; 
        $this->idKey = $idKey; 
        $this->valueKey = $valueKey;
        $this->options = $this->formatCollection($options);
    }

    public function formatCollection($options): Collection 
    {   
        return collect($options)->map(function ($option) {
            return match(true) {
                $option instanceof UnitEnum => [
                    'id'    => $option->value ?? 'Onbekend', 
                    'label' => $option->value
                ],
                is_object($option) => [
                    'id'    => $option->{$this->idKey} ?? null,
                    'label' => $option->{$this->valueKey} ?? null
                ], 
                default => [
                    'id'    => $option, 
                    'label' => $option
                ] 
            };
        });
    }

    public function render(): View
    {
        return view('components.forms.select');
    }
}
