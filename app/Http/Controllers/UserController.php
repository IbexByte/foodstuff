<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('Dashboard.user', compact('users'));
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
        //
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
        $user = User::findOrFail($id);
        $jobs = JobTitle::all();
        return view('Dashboard.editeUserJob', compact('user', 'jobs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        
        // Validate the input fields
        $validatedData = $request->validate([
            'job_title_id' => 'required'
        ]);
    
        // Update the user's category
        $user->job_title_id = $validatedData['job_title_id'];
        $user->save();
    
        // Redirect to the user's profile page with a success message
        return redirect()->route('users.index', $user->id)->with('success', 'تم تحديث مسمى الوظيفة بنجاح!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
