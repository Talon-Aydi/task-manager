<?php

namespace App\Enums;

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
}
