<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobTitles = JobTitle::withCount('users')->get();
        return view('Dashboard.more.job_title', compact('jobTitles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.more.create_job');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|unique:job_titles',
    //     ]);

    //     $jobTitle = new JobTitle([
    //         'title' => $request->get('title'),
    //     ]);
    //     $jobTitle->save();

    //     return back()->with('success', 'تم ‘نشاء المسمى الوظيفي بنجاح.');

    // }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255|unique:job_titles,title'
    ], [
        'title.required' => 'حقل إسم المسمى مطلوب',
        'title.string' => 'حقل إسم المسمى يجب أن يكون نصياً',
        'title.max' => 'حقل إسم المسمى يجب أن لا يتجاوز 255 حرفاً',
        'title.unique' => 'هذا المسمى موجود بالفعل'
    ]);

    $jobTitle = new JobTitle();
    $jobTitle->title = $validatedData['title'];
    $jobTitle->save();

    return redirect()->route('job_titles.index')->with('success', 'تم إضافة المسمى بنجاح');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
