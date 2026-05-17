<div class="rounded-lg border bg-white p-3 text-left flex flex-col space-y-2">
    <div class="flex flex-row justify-between ">
        
    <div class="text-[12px] space-x-1 mt-auto mb-auto">
        <span class="p-2 {{$task->status->color()}} rounded-lg">
            {{$task->status}}
        </span>
    </div>
        <div class="dropdown mt-auto mb-auto">
            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots-vertical"></i>
            </button>
            
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{$task->id}}/edit">Edit</a></li>
                    <form action="/{{$task->id}}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item">
                            Delete
                        </button>
                    </form>
                </ul>
        </div>
    </div>
    
    <div class="flex flex-col">
        <span class="font-extrabold">
            {{$task->titel}}
        </span>
        <span class="text-[12px] text-gray-600 font-semibold">
            {{$task->omschrijving}}
        </span>
    </div>
    
    <div class="text-[12px] font-semibold">
        <span class="text-gray-600">
        <i class="bi bi-clock"></i> 
            Deadline: 
        </span>
        <span>
            {{ $task->deadline_date }} at {{$task->deadline_time}}
        </span>
    </div>
    <div>
        <span class="text-[12px] bg-gray-100 p-1 rounded-sm mt-auto mb-auto">
            {{$task->category->name}}
        </span>
    </div>
</div>