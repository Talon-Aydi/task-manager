<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['titel', 'omschrijving', 'status', 'deadline', 'category_id'])]
class Task extends Model
{
    public function category()
    {
        return $htis->belongsTo(Category::class);
    }
}
