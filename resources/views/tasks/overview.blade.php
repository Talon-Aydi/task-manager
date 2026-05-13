<x-layout>
    <div class="flex flex-col space-y-2 m-auto w-[40rem]">
        <div class="text-center p-5 rounded-xl border bg-gray-50 shadow-sm border-grey-800 rounded-lg">
            <div class="w-full p-2 text-left">
                <span class="text-[20px] text-red-800">
                    Tasks
                </span>
            </div>
            <div class="space-y-3 overflow-y h-[35rem] overflow-auto">
                @forelse ($tasks as $task)
                    <x-tasks.card :task="$task" />
                @empty 
                    <p> No tasks found. </p>
                @endforelse
            </div>
        </div>
    </div>
</x-layout> 
