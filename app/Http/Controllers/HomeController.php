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
        $user = Auth::user(); // Get the currently authenticated user

        if ($user) {
            // Check user roles and redirect accordingly
            if ($user->hasRole('superuser') || $user->hasRole('admin')) {
                $users = User::all(); // Fetch all users
                return view('super.index', compact('users'));
            }
             elseif ($user->hasRole('alumni')) {
                return view('alumni.index');
            }  else {
                return redirect()->route('home')->with('error', 'Unauthorized access');
            }
        }
    }

    public function updateRole(Request $request, $id)
    {

        $user = User::find($id);

        if ($user) {
            $user->usertype = $request->usertype;
            $user->save();
            // notify()->success('User type has been updated successfully');
        } else {
            // notify()->error('User not found');
        }
        return redirect('/home');
    }

    public function createjob()
    {
        return view('admin.layouts.createjob');
    }

    public function jobcreate(Request $request)
    {
        // Validate input
        $request -> validate([
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category' => 'required|in:Cyber Security,Software Development',
            'position' => 'required|string|max:255',
            'experience' => 'required|integer',
            'qualifications' => 'required|array',
            'qualifications.*' => 'required|string|max:255',
        ]);

        $job = Istjob::create([
            'company' => $request->company,
            'location' => $request->location,
            'description' => $request->description,
            'category' => $request->category,
            'position' => $request->position,
            'experience' => $request->experience,
        ]);

        foreach ($request->qualifications as $qualification) {
            $job->qualifications()->create(['qualification' => $qualification]);
        }
        return redirect()->back();
    }

    public function viewjob()
    {
        $job = Istjob::orderBy('company', 'asc')->get();
        return view ('admin.layouts.viewjob',compact('job'));
    }

    public function deletejob($id)
    {
        $job = Istjob::find($id);
        $job->delete();
        return redirect()->back();
    }

    public function editjob($id)
    {
        $job = Istjob::find($id);
        $qualification = Qualification::find($id);
        return view('admin.layouts.editjob',compact('job','qualification'));
    }

    public function jobedit(Request $request, $id)
    {
        $job = Istjob::find($id);

        $request->validate([
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category' => 'required|in:Cyber Security,Software Development',
            'position' => 'required|string|max:255',
            'experience' => 'required|integer',
            'qualifications' => 'required|array',
            'qualifications.*' => 'required|string|max:255',
        ]);

        $job->update([
            'company' => $request->company,
            'location' => $request->location,
            'description' => $request->description,
            'category' => $request->category,
            'position' => $request->position,
            'experience' => $request->experience,
        ]);

        // Delete old qualifications
        $job->qualifications()->delete();

        // Add new qualifications
        foreach ($request->qualifications as $qualification) {
            $job->qualifications()->create(['qualification' => $qualification]);
        }

        return redirect('/viewjob')->with('success', 'Job updated successfully!');
    }

    public function viewposting()
    {
        return view('alumni.layouts.view_post');
    }

    public function postview(Request $request)
    {
        $category = $request->query('category');

        if ($category) {
            $jobs = Istjob::where('category', $category)->get();
        } else {
            $jobs = Istjob::all();
        }

        return view('alumni.layouts.postview', compact('jobs', 'category'));
    }

}
