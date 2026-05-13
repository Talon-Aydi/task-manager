<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['id', 'name'])]
class Category extends Model
{
    public function task()
    {
        return $this->hasOne(Task::class);
    }
}
