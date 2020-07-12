<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Session;
class TaskController extends Controller
{
public function index()
{
    $tasks = Task::orderBy('id', 'desc')->get();

    return view('tasks.index')->with('storedTasks', $tasks);
}


// Store...........................................................
public function store(Request $request)
{
    $this->validate($request, [
        'taskname' => 'required |min:5|max:255',
    ]);

      $task = new Task;
      $task->name = $request->taskname;
      $task->save();
      Session:: flash('success', 'New task has been successfully added');

      return redirect()->route('task.index');
}

// Delete............................................................
public function destroy($id)
{
    $task = Task:: find($id);
    $task->delete();
    Session::flash('success', 'Task ' . 'Has been sucessfully deleted');
    return redirect()->route('task.index');
}

// Edit................................................................
public function edit($id){

     $task = Task::find($id);
    return view('tasks.edit')->with('taskUnderEdit', $task);

}

// Update..............................................................
public function update(Request $request, $id)
{
    $this->validate($request, [
        'TaskName' => 'required |min:5|max:255',
    ]);

    $task = Task::find($id);
    $task->name = $request->input('TaskName');
    $task->save();

    Session::flash('success', 'Task ' . 'Has been sucessfully updated');

    return redirect()->route('task.index');

}

}
