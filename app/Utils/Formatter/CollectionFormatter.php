<?php

namespace App\Utils\Formatter; 
use Illuminate\Support\Collection;
use UnitEnum;
use InvalidArgumentException;

class CollectionFormatter {
    public static function formatCollection($options, $idKey = 'id', $valueKey ='value'): Collection 
    {   
        if (is_null($options)) {
            throw new InvalidArgumentException("Provided collection cannot be empty.");
        }
        return collect($options)->map(fn($option) => match(true) {
                $option instanceof UnitEnum => [
                    'id'    => $option->value, 
                    'label' => $option->value
                ],
                is_object($option) => [
                    'id'    => $option->{$idKey} ?? null,
                    'label' => $option->{$valueKey} ?? null
                ], 
                default => throw new UnhandledMatchError("Unsupported type provided to formatter.")
        });
    }
}