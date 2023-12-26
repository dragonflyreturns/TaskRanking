<x-app-layout>
    <h1 class="text-5xl lg:font-bold text-center border-b pb-2 border-black">Create/Delete Type</h1>
    <div class="m-6">
    <h2 class="text-center">Create a new type</h2>
    <form action='/tasks/createType' method="POST">
        @csrf
        <div class="flex mx-auto max-w-md justify-center">
            <textarea name="name" class="resize-none border p-2 m-2"></textarea>
        </div>
       
        <div class="flex flex-auto justify-center mx-auto max-w-md">    
            
            <input type="submit" value="Create" class="flex cursor-pointer text-center p-3 hover:bg-gray-100 border bg-white border-black m-2">
        </div>
    </form>        
    </div>
    <div class="m-6">
       <form id="deleteTypeForm" method="POST">
            @csrf
            @method('DELETE')
            <h2 class="text-center">Select and delete the type</h2>
            <div class="flex mx-auto max-w-md justify-center">
                <select id="categorySelect" name="category_id" value="{{ old('category_id') }}">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <input type="submit" value="Delete Type" class="cursor-pointer text-center p-3 hover:bg-gray-100 border bg-white border-black m-2">
            </div>
        </form>
    </div>
    <div class="flex flex-auto justify-center">
        <a href="/tasks/create" class="flex p-3 hover:bg-gray-100 border bg-white border-black m-2">Back</a>
    </div>
    <script>
            document.getElementById('categorySelect').addEventListener('change', function() {
                var categoryId = this.value;
                var formAction = '/tasks/createType/' + categoryId;
                document.getElementById('deleteTypeForm').action = formAction;
            });
        </script> 
</x-app-layout>
