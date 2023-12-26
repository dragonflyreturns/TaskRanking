<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category; 
use App\Models\Color; 
use Auth;

class TaskController extends Controller
{
    public function show(Task $task)
    {
        
        return view("tasks.task")->with(['tasks' => $task->orderBy('end_date')->get()]);
    }

    public function create(Category $category, Color $color)
    {
        return view("tasks.create")->with(['categories' => $category->get(), 'colors'=> $color->get()]);
    }
    
    public function createType(Category $category)
    {
        
        return view('tasks.createType')->with(['categories' => $category->get()]);
    }
    
    public function store(Task $task, Request $request)
    {
            $input = $request['task'];
            $input['user_id'] = Auth::id();
            $task->fill($input)->save();
            return redirect('/tasks'); 
        
    }
    
    public function storeType(Category $category, Request $request)
    {
            $input = $request->all();
            $category->fill($input)->save();
            return redirect('/tasks/create'); 
    }
    
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
    
    public function destroyType(Category $category)
    {
        
        $category->tasks()->delete();
        $category->delete();
        return redirect('/tasks/createType');
    }
}

