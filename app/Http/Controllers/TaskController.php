<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    function addTask(Request $request)
    {
        $field = $request->validate([
            'description' => 'required'
        ]);
        Task::create(['description' => $field['description'], 'user_id' => $request->session()->get('user_id')]);
        return redirect('/');
    }

    function viewTasks(Request $request)
    {
        $tasks = Task::all()->where('user_id', '=', $request->session()->get('user_id'));
        return view('todo', ['tasks' => $tasks]);
    }

    function deleteTask($id)
    {
        Task::destroy($id);
        $tasks = Task::all()->where('user_id', '=', Auth::user()->id);
        return redirect('/');
    }

    function editTask($id)
    {
        $task = Task::find($id);
        $task->done = !$task->done;
        $task->save();
        return redirect('/');
    }
}
