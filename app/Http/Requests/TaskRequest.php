<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
Use App\Enums\TaskStatus; 


class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titel'         => ['required', 'string', 'max:255'],
            'omschrijving'  => ['required', 'string'],
            'status'        => ['required', Rule::enum(TaskStatus::class)],
            'deadline'      => ['required', 'date', 'after:today'],
            'category_id'      => ['required', 'exists:categories,id'],
        ];
    }
}
