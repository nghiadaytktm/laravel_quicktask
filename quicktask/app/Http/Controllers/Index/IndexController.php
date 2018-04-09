<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index(){
        return view('index.index');
    }
    public function getTask(){
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('index.task',compact('tasks'));
    }
    public function postTask(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect()->route('index.task');
    }
    public function delete($id){
        Task::findOrFail($id)->delete();

        return redirect()->route('index.task');
    }

}
