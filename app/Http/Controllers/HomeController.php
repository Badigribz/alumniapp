<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Istjob;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id())
        {
            $user_type = Auth()->user()->usertype;

            if ($user_type == 'super-admin') 
            {
                return view('super.index');
            }
            elseif ($user_type == 'alumni') 
            {
                return view('alumni.index');
            }
            elseif ($user_type == 'admin') 
            {
                return view('admin.index');
            }
            else {
                return redirect()->back();
            }
        }
    }

    public function createjob()
    {
        return view('admin.layouts.createjob');
    }

    public function jobcreate(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category' => 'required|in:Cyber Security,Software Development',
            'position' => 'required|string|max:255',
            'experience' => 'required|integer',
            
            
            'qualification' => 'required|exists:qualifications,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $job = new Istjob;
        $job->company = $request->input('company');
        $job->location = $request->input('location');
        $job->description = $request->input('description');
        $job->category = $request->input('category');
        $job->position = $request->input('position');
        
        $job->save();

        // Save qualifications
        foreach ($request->input('qualifications') as $qualification) {
        $qualification = new Qualification;
        $qualification->job_id = $job->id;
        $qualification->qualification = $qualification;
        $qualification->save();
    }

    return redirect()->back()->with('success', 'Job created successfully!');
    }
}
