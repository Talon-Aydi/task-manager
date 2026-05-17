<x-layout>
    <div class="m-auto w-[30rem]">
        <form
            id="task-form"
            action="{{ $isEdit ? route("tasks.update", $task->id) : route("tasks.store") }}"
            method="POST"
            class="border-grey-800 flex flex-col space-y-3 rounded-lg border bg-gray-50 p-10 shadow-sm"
        >
            @csrf
            @if ($isEdit)
                @method("PUT")
            @endif

            <div class="flex flex-row justify-between">
                <span class="text-[20px] text-red-800">
                    {{ $isEdit ? "Edit task" : "New task" }}
                </span>
                <a href="/" class="btn btn-outline-danger">
                    <i class="bi bi-arrow-left text-black"></i>
                </a>
            </div>

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
                <x-forms.input
                    inputType="text"
                    inputLabel="Titel"
                    inputId="titel"
                    :value="old('titel', $task->titel ?? '')"
                />
                <x-forms.text-area
                    textAreaTitle="Omschrijving"
                    textAreaId="omschrijving"
                    :value="old('omschrijving', $task->omschrijving ?? '')"
                />
                <x-forms.select
                    idKey="status"
                    inputName="status"
                    labelName="Status"
                    :options="$states"
                    :value="old('status', $task->status_value ?? '')"
                />

                <div class="flex flex-row space-x-4">
                    <x-forms.input
                        inputType="date"
                        inputLabel="Deadline"
                        inputId="deadline_date"
                        :value="old('deadline', $task->deadline_date ?? '')"
                    />
                    <x-forms.input
                        inputType="time"
                        inputLabel="Deadline"
                        inputId="deadline_time"
                        :value="old('deadline', $task->deadline_time ?? '')"
                    />
                </div>

                <x-forms.select
                    idKey="id"
                    inputName="category_id"
                    labelName="category"
                    valueKey="naam"
                    :options="$categories"
                    :value="old('category_id', $task->category_id ?? '')"
                />
            </div>
            <button
                type="submit"
                class="btn btn-dark !ml-auto h-[3rem] w-[10rem]"
            >
                {{ $isEdit ? "Update task" : "Create task" }}
            </button>
        </form>
    </div>
</x-layout>
