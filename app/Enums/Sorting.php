<?php

namespace App\Enums;
use App\Utils\Formatter\CollectionFormatter;
use Illuminate\Support\Collection;

enum Sorting: string 
{
    case LastUpdated = 'Last Updated'; 
    case FirstUpdated = 'First updated'; 
    case StatusDesc = 'Status decending';
    case StatusAsc = 'Status ascending';

    public static function asSelectOptions(): Collection
    {
        return CollectionFormatter::formatCollection(self::cases());
    }
}
