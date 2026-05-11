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
    public string $selectId;

    public function __construct($options, $selectId)
    {
        $this->options = $this->formatCollection($options);
        $this->selectId = $selectId; 
    }

    public function formatCollection($options): Collection 
    {
        return collect($options)->map(function ($option) {
            return match(true) {
                $option instanceof UnitEnum => [
                    'id'    => $option->name ?? 'Onbekend', 
                    'label' => $option->value
                ],
                is_object($option) => [
                    'id'    => $option->id ?? 'Onbekend',
                    'label' => $option->naam ?? 'Onbekend'
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
