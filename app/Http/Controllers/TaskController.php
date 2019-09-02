<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function savetask(Request $request){

        $task=new Task;
        $this->validate($request,[
            'task'=>'required|max:100|min:5',
        ]);

        $task->task=$request->task;
        $task->save();

        $data=Task::all();
//        dd($data);
//        return redirect()->back();

        return view('task')->with('tasks',$data);

    }

    public function markascompleted($id){


    $task=Task::find($id);
    $task->iscompleted=1;
    $task->save();
    return redirect()->back();
    }

    public function markasnotcompleted($id){
        $task=Task::find($id);
        $task->iscompleted=0;
        $task->save();
        return redirect()->back();
    }

    public function deletetask($id){
        $task=Task::find($id);
        $task->delete();
        return redirect()->back();
    }

    public function updatetasksview($id){

        $task=Task::find($id);
        return view('updateview')->with('taskdata',$task);


    }

    public function updatetasks(Request $request){

        $id=$request->id;
        $task=$request->task;
        $data=Task::find($id);
        $data->task=$task;
        $data->save();
        $data=Task::all();
        return view('task')->with('tasks',$data);

    }
}
