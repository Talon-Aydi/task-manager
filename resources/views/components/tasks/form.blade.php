<div>
    <div class="bg-pink-200 w-[10rem] rounded-t-xl p-2 text-center">
        <span class="text-[20px] font-extrabold text-white">
            Create task
        </span>
    </div>
    <form class="flex flex-col bg-pink-200 p-10 rounded-tr-xl rounded-b-xl">
        <div class="flex flex-row space-x-4">
            <div class="flex flex-col">
                <x-forms.input inputType="text" inputLabel="Titel" inputId='titelId' inputPlaceholder='Jane doe' />
                <x-forms.input inputType="text" inputLabel="Omschrijving" inputId='titelId' inputPlaceholder='Jane doe' />
            </div>
            <div class="flex flex-col">
                <x-forms.select />
                <x-forms.input inputType="datetime-local" inputLabel="Deadline" inputId='deadlineId' inputPlaceholder='Jane doe' />
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-[10rem]">Create task</button>
    </form>
</div>
