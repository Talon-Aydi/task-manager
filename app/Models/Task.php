<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Enums\TaskStatus;

#[Fillable(['titel', 'omschrijving', 'status', 'deadline', 'category_id'])]
class Task extends Model
{
    protected $casts = [
        'status' => TaskStatus::class,
    ]; 

    protected $with = ['category']; 

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
