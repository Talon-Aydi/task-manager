<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
Use App\Enums\TaskStatus; 


class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void 
    {
        if ($this->filled(['deadline_date', 'deadline_time'])) {
            $this->merge([
                'deadline' => $this->deadline_date . ' ' . $this->deadline_time,
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'titel'         => ['required', 'string', 'max:25'],
            'omschrijving'  => ['required', 'string'],
            'status'        => ['required', Rule::enum(TaskStatus::class)],
            'deadline'      => ['required', 'date', 'after:now'],
            'category_id'   => ['required', 'exists:categories,id'],
        ];
    }

    public function messages(): array 
    {
        return [
            'deadline.after' => 'Deadlines can only be in the future.',
        ];
    }
}
