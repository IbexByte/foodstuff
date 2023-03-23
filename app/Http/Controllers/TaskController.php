<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return view('Dashboard.tasks.index', compact('tasks'));
    }


    /**
     * Show the form for creating a new resource.
     */

     public function create()
     {
         return view('Dashboard.tasks.create');
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ],
    [
        'name.required' => 'أدخل على الأقل إسم المهمة'
    ]
    );


        $task = new Task();
        $task->name = $validatedData['name'];
        $task->description = $validatedData['description'];
        $task->save();

        return redirect()->route('tasks.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('Dashboard.tasks.show', compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('Dashboard.tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Task $task)
    // {
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'description' => 'nullable',
        //     'completed' => 'nullable',
        // ]);

    //     $task->title = $validatedData['title'];
    //     $task->description = $validatedData['description'];
    //     $task->completed = $validatedData['completed'] ?? false;
    //     $task->save();

    //     return redirect()->route('tasks.index');
    // }

    public function update(Request $request, $id)
{
    $task = Task::findOrFail($id);
    $task->completed = $request->input('completed', false);
    $task->user_id = auth()->id();
    $task->save();
    return redirect()->route('tasks.index')->with('success', 'تم تغيير حالة المهمة بنجاح.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
