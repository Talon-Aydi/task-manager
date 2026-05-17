<x-layout>
    <div class="m-auto flex w-[40rem] flex-col space-y-2">
        <div
            class="border-grey-800 rounded-lg rounded-xl border bg-gray-50 p-5 text-center shadow-sm"
        >
            <div class="flex w-full flex-row justify-between p-2 text-left">
                <span class="text-[20px] text-red-800">Tasks</span>
                <a href="/create" class="btn btn-outline-danger">Create task</a>
            </div>
            <div class="flex flex-row justify-end">
                <x-filter.sort />
            </div>
            <div
                class="overflow-y h-[35rem] space-y-3 overflow-auto"
                id="task-container"
            >
                @fragment("task-list")
                    @forelse ($tasks as $task)
                        <x-tasks.card :task="$task" />
                    @empty
                        <p>No tasks found.</p>
                    @endforelse
                @endfragment
            </div>
        </div>
    </div>
</x-layout>
