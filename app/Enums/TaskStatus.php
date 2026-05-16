<?php

namespace App\Enums;
use App\Utils\Formatter\CollectionFormatter;
use Illuminate\Support\Collection;

enum TaskStatus: string 
{
    case ToDo = 'To do';
    case InProgress = 'In progress';
    case Done = 'Done';

    public function color(): string 
    {
        return match($this) {
            self::ToDo => 'bg-[#b1ccf9]', 
            self::InProgress => 'bg-[#fff8bc]',
            self::Done => 'bg-[#bffdb8]',
        };
    }

    public static function asSelectOptions(): Collection
    {
        return CollectionFormatter::formatCollection(self::cases());
    }
}
