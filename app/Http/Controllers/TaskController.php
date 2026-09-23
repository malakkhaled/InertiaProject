<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
     $query = Task::where('user_id', auth()->id());

    // 1. فلتر المنجز وغير المنجز
  

     if ($request->filter === 'done') {
        $query->where('done', 1); // أو حسب اسم القيمة عندك
    } elseif ($request->filter === 'notDone') {
        $query->where('done', 0);
    }

    // 2. فلاتر الأولوية (Very, Less، إلخ)
    if ($request->filter === 'very') {
        $query->where('priority', 'very'); // أو حسب اسم القيمة عندك
    } elseif ($request->filter === 'less') {
        $query->where('priority', 'less');
    }

    // 3. فلاتر التواريخ (Today, Tomorrow) باستخدام Carbon
    if ($request->filter === 'today') {
        $query->whereDate('created_at', today()); // أو حقل التاريخ الخاص بالمهمة
    } 
  if ($request->filter === 'all') {
    
    } 
    $tasks = $query->get();

    return Inertia::render('Dashboard', [
        'tasks' => $tasks,
        'type'=> $request->filter 
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'task_name' => 'required|string|max :50 |regex:/^(?!\d+$).+/',
        'task_info'=>'nullable|string|max :300| regex:/^(?!\d+$).+/',
        'priority'=>'required|string'
       ], [
    // تخصيص رسائل الخطأ هنا
    'task_name.required' => 'Task name is required',
     'task_name.max : 255' => 'Task name should not  be too long',
    'task_name.regex' => 'Task name should be letters and numbers togather',
       'task_info.regex' => 'Task Info should be letters and numbers togather',
    'priority.required' => 'please chooes the priority of this task'
]);

     Task::create(array_merge($validated, [
    'user_id' => auth()->id()
]));
        return redirect()->back()->with('success', 'The task added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
         'task_name' => 'required|string|max :50 |regex:/^(?!\d+$).+/',
        'task_info'=>'nullable|string|max :300| regex:/^(?!\d+$).+/',
        'priority'=>'required|string'
       ]);

       $task->update($validated);
       return redirect()->back()->with('success', 'The task updated successfully');
    }

    public function toggle(Task $task)
{
    // عكس القيمة الحالية (إذا كانت 0 تصبح 1 والعكس)
    $task->update([
        'done' => !$task->done
    ]);

    return back();
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
       $task->delete();
        return redirect()->back()->with('success','The task deleted successfully');

    }
}
