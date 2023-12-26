<x-app-layout>
    <h1 class="text-5xl lg:font-bold text-center border-b pb-2 border-black">New Task</h1>
    <form action='/tasks' method="POST">
        @csrf
        <div class="flex flex-auto justify-center">
            <a href="/tasks/createType" class="border bg-white p-3 m-3 hover:bg-gray-100 border-black rounded-2xl">Create/Delete Type</a>
        </div>
        
        <div class="flex flex-col justify-center mx-auto max-w-md p-10 border bg-blue-100 border-black">
                <div class="flex m-1 justify-between">
                    <h2>Type:</h2>
                <select name="task[category_id]" value="{{ old('task.category_id') }}">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                
                </div>
            <div class="flex m-1 justify-between gap-6">
                <h2>Content:</h2>
                <textarea name="task[body]" class="resize-none border p-2" rows="4" cols="40">{{ old('task.body') }}</textarea>
                
            </div>
            <div class="flex m-1 justify-between">
                <h2 class="text-red-500">Deadline:</h2>
                <input type="datetime-local" name="task[end_date]" value="{{ old('task.end_date') }}">
                
            </div>
            <div class="flex m-1 justify-between">
                <h2>Early Deadline:</h2>
                <input type="datetime-local" name="task[fast_end_date]" value="{{ old('task.fast_end_date') }}">
                
            </div>
            <div class="flex m-1 justify-between">
            <h2>Color:</h2>
                <select name="task[color_id]" value="{{ old('task.color_id') }}">
                    @foreach($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                </select>
                
            </div>
    
            <div class="flex mt-12 justify-evenly">
                <div class="p-3 hover:bg-gray-100 border bg-white border-black">
                    <a href="/" class="text-center">Back</a>
                </div>
                <input type="submit" value="Create Task" class="cursor-pointer text-center p-3 hover:bg-gray-100 border bg-white border-black">
            </div>
        </form>    
    </div>
</x-app-layout>
