@php
    $isEdit = isset($task) && $task->exists; 
@endphp

<x-layout>
    <div class="w-[30rem] m-auto">
        <form 
        id="task-form"
        action="/"
        method="POST"
        class="flex flex-col space-y-3 p-10 border bg-gray-50 shadow-sm border-grey-800 rounded-lg">
       @csrf
       @if($isEdit)
            @method('PUT')
        @endif
        <span class="text-[20px] text-red-800">
            {{ $isEdit ? 'Edit task' : 'New task'}}
        </span>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex flex-col space-y-4">
            <x-forms.input inputType="text" inputLabel="Titel" inputId='titel' :value="old('titel', $task->titel ?? '')"/>
            <x-forms.text-area textAreaTitle="Omschrijving" textAreaId="omschrijving" :value="old('omschrijving', $task->omschrijving ?? '')" />
            <x-forms.select idKey="status" inputName="status" labelName="Status" :options="$states" :value="old('status', $task->status_value ?? '')" />
            
            <div class="flex flex-row space-x-4">
                <x-forms.input inputType="date" inputLabel="Deadline" inputId='deadline_date' :value="old('deadline', $task->deadline_date ?? '')"/>
                <x-forms.input inputType="time" inputLabel="Deadline" inputId='deadline_time' :value="old('deadline', $task->deadline_time ?? '')" />
            </div>

            <x-forms.select idKey="id" inputName="category_id" labelName="category" valueKey="naam" :options="$categories" :value="old('category_id', $task->category_id ?? '')"/>
        </div>
        <button type="submit" class="btn btn-dark !ml-auto w-[10rem] h-[3rem]">Create task</button>
    </form>
    </div>
    
</x-layout> 