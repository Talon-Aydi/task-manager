<?php

namespace App\Enums;

enum TaskStatus: string 
{
    case ToDo = 'To do';
    case InProgress = 'In progress';
    case Done = 'Done';
}
