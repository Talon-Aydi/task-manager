<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Enums\TaskStatus;

#[Fillable(['titel', 'omschrijving', 'status', 'deadline', 'category_id'])]
class Task extends Model
{
    protected $casts = [
        'status' => TaskStatus::class,
        'deadline' => 'datetime',
    ]; 

    protected $with = ['category']; 

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function deadlineDate(): Attribute 
    {
        return Attribute::make(get: fn () => $this->deadline?->format('Y-m-d'));
    }
    
    protected function deadlineTime(): Attribute 
    {
        return Attribute::make(get: fn () => $this->deadline?->format('H:i'));
    }

    protected function statusValue(): Attribute 
    {
        return Attribute::make(get: fn () => $this->status?->value);
    }
}
