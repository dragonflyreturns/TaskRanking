<x-app-layout>
        <h1 class="text-5xl lg:font-bold text-center border-b pb-2 mb-4 border-black">Task Ranking</h1>
            <div>
                <p class="text-center text-xl mb-4">Total Number of Tasks: {{ count($tasks) }}</p>
            @foreach ($tasks as $task)
                <div class='m-2 border-2 mb-6 border-black'>
                    <div class="flex">
                        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-3 hover:bg-green-200 hover:text-black border-b border-r bg-green-600 border-black text-white">Done</button>
                        </form>
                        
                        <p class='p-3 border-black bg-blue-900 text-white border-b border-r'>Type: {{ $task->category->name }}</p>
                    </div>
                    
                    
                    <p class='m-1'>Content：{{ $task->body }}</p>
                    <div class="flex">
                        <p class='m-1 text-red-500 font-bold text-2xl'>Deadline: {{$task->end_date}}</p>
                        <p class='m-1'>Early Deadline: {{$task->fast_end_date}}</p>
                    </div>
                    
                </div>
                
            @endforeach
        </div>
</x-app-layout>