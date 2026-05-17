<?php

namespace App\Enums;
use App\Utils\Formatter\CollectionFormatter;
use Illuminate\Support\Collection;

enum Sorting: string 
{
    case LastUpdated = 'Last Updated'; 
    case FirstUpdated = 'First updated'; 
    case ToDo = 'To do';
    case InProgress = 'In progress';
    case Done = 'Done'; 

    public static function asSelectOptions(): Collection
    {
        return CollectionFormatter::formatCollection(self::cases());
    }
}
