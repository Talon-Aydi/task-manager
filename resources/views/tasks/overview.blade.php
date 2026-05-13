<x-layout>
    <div class="flex flex-col space-y-2 m-auto w-[40rem]">
        <x-tasks.form />
        <div class="text-center p-5 rounded-xl space-y-3 border bg-gray-50 shadow-sm border-grey-800 rounded-lg">
            <div class="w-full p-2 text-left">
                <span class="text-[20px] text-red-800">
                    Tasks
                </span>
            </div>
            
            @forelse ($tasks as $task)
                <x-tasks.card :task="$task" />
            @empty 
                <p> No tasks found. </p>
            @endforelse
        </div>
    </div>
    
</x-layout> 
