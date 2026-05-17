<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Enums\TaskStatus;
use App\Enums\Sorting;

#[Fillable(['titel', 'omschrijving', 'status', 'deadline', 'category_id'])]
class Task extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => TaskStatus::class,
        'deadline' => 'datetime',
    ]; 

    protected $with = ['category']; 

    public function scopeApplySorting(Builder $query, ?string $sortOption): Builder
    {
        return match ($sortOption) {
            Sorting::FirstUpdated->value => $query->orderBy('updated_at', 'asc'),
            Sorting::LastUpdated->value  => $query->orderBy('updated_at', 'desc'),
            Sorting::ToDo->value         => $query->where('status', 'To do'),
            Sorting::InProgress->value   => $query->where('status', 'In progress'),
            Sorting::Done->value         => $query->where('status', 'Done'),
            default                      => $query->latest(), 
        };
    }

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
