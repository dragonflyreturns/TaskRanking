<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Task;


class EventController extends Controller
{
    public function show(){
        return view("calendars/calendar");
    }
    
    public function get(Request $request, Task $task){
        // バリデーション
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer'
        ]);

        // 現在カレンダーが表示している日付の期間
        $start_date = date('Y-m-d', $request->input('start_date')); // 日付変換（JSのタイムスタンプはミリ秒なので秒に変換）
        $end_date = date('Y-m-d', $request->input('end_date')); //$request->input('end_date') / 1000);
        
        
        
        
        
        $tasks = $task->query()
            // ->where('end_date', '>', $start_date)
            // ->where('end_date', '<', $end_date) // AND条件
            ->get();
        $values = collect();
        foreach($task->get() as $task) {
            $obj = collect ([
                'id'   => $task->id,
                'title' => $task->category->name,
                'description'   => $task->body,
                'start'   => $task->end_date,
                'end' => $task->end_date,
                'backgroundColor' => $task->color->name,
                'borderColor' => $task->color->name
            ]);
            $values->push( $obj );
        }
        return $values;
    }
}
