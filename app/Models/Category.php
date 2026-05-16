<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Utils\Formatter\CollectionFormatter;
use Illuminate\Support\Collection;

#[Fillable(['id', 'name'])]
class Category extends Model
{
    public function task()
    {
        return $this->hasOne(Task::class);
    }

    public static function asSelectOptions(): Collection 
    {
        return CollectionFormatter::formatCollection(self::all(), 'id', 'name');
    }
}
