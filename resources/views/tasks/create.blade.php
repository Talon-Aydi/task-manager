<x-layout>
    <div class="w-[30rem] m-auto">
        <form 
        id="task-form"
        action="/"
        method="POST"
        class="flex flex-col space-y-3 p-10 border bg-gray-50 shadow-sm border-grey-800 rounded-lg">
       @csrf
        <span class="text-[20px] text-red-800">
            New task
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
            <x-forms.input inputType="text" inputLabel="Titel" inputId='titel'/>
            <x-forms.text-area textAreaTitle="Omschrijving" textAreaId='omschrijving' />
            <x-forms.select idKey="status" inputName="status" labelName="Status" :options="$states" />
            
            <div class="flex flex-row space-x-4">
                <x-forms.input inputType="date" inputLabel="Deadline" inputId='deadline_date'/>
                <x-forms.input inputType="time" inputLabel="Deadline" inputId='deadline_time' inputPlaceholder='12:00' />
            </div>

            <x-forms.select idKey="id" inputName="category_id" labelName="category" valueKey="naam" :options="$categories" />
        </div>
        <button type="submit" class="btn btn-dark !ml-auto w-[10rem] h-[3rem]">Create task</button>
    </form>
    </div>
    
</x-layout> 