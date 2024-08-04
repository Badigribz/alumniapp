<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Istjob;
use App\Models\gallery;
use App\Models\portfolio;
use Illuminate\Http\Request;
use App\Models\Qualification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the currently authenticated user

        if ($user) {
            // Check user roles and redirect accordingly
            if ($user->hasRole('superuser')) {
                $super = DB::table('model_has_roles')->where('role_id', 1)->count();
                $admin = DB::table('model_has_roles')->where('role_id', 2)->count();
                $alumni = DB::table('model_has_roles')->where('role_id', 3)->count();
                $users = User::all(); // Fetch all users
                $userDetails = DB::table('users')
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->select('users.name', 'roles.name as role')
                    ->get();
                $roleDetails = DB::table('roles')
                    ->get();
                $permDetails = DB::table('permissions')
                    ->get();
                return view('super.index', compact('users', 'super', 'admin', 'alumni', 'userDetails', 'roleDetails', 'permDetails'));

            } elseif ($user->hasRole('alumni')) {
                $images = gallery::all();
                return view('alumni.index', compact('images'));

            } elseif ($user->hasRole('admin')) {
                $super = DB::table('model_has_roles')->where('role_id', 1)->count();
                $admin = DB::table('model_has_roles')->where('role_id', 2)->count();
                $alumni = DB::table('model_has_roles')->where('role_id', 3)->count();
                $users = User::all(); // Fetch all users
                $userDetails = DB::table('users')
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->select('users.name', 'roles.name as role')
                    ->get();
                $roleDetails = DB::table('roles')
                    ->get();
                $permDetails = DB::table('permissions')
                    ->get();
                return view('admin.index', compact('users', 'super', 'admin', 'alumni', 'userDetails', 'roleDetails', 'permDetails'));

            } elseif ($user->hasRole('employer')) {
                return view('employer.index');

            }else {
               // return redirect()->route('home')->with('error', 'Unauthorized access');
               Auth::logout();
               return redirect()->route('login')->with('error', 'Unauthorized access');
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

    public function jobdesc($id)
    {
        $job = Istjob::with('qualifications')->findOrFail($id);
        return view('alumni.layouts.jobdesc', compact('job'));
    }

    public function addport()
    {
        $user = Auth::user();
        return view('alumni.layouts.createport', compact('user'));
    }

    public function portadd(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'profession' => 'required|string|max:255',
            'about_me' => 'required|string',
            'services' => 'required|array',
            'services.*.service' => 'required|string|max:255',
            'services.*.description' => 'required|string|max:200',
            'links' => 'required|array',
            'links.*.work_category' => 'required|string|max:255',
            'links.*.link' => 'required|string|max:255',
            'cv' => 'nullable|file|mimes:pdf,doc,docx', // Validate CV file
        ]);

        // Update user details
        $user = auth()->user();
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // Create or update portfolio
        $portfolioData = [
            'user_id' => $user->id,
            'phone_number' => $request->input('phone_number'),
            'profession' => $request->input('profession'),
            'about_me' => $request->input('about_me'),
        ];

        // Handle CV file upload
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv_files'); // Store CV file
            $portfolioData['cv'] = $cvPath;
        }

        $portfolio = portfolio::create($portfolioData);

        // Store services
        foreach ($request->input('services') as $service) {
            $portfolio->services()->create($service);
        }

        // Store links
        foreach ($request->input('links') as $link) {
            $portfolio->links()->create($link);
        }

        return redirect()->back()->with('success', 'Portfolio added successfully.');
    }

    public function viewport()
    {
        $user_id = Auth::id(); 
        $portfolios = portfolio::where('user_id', $user_id)->get();
        return view('alumni.layouts.viewport', compact('portfolios'));
    }

    public function deleteport($id)
    {
        $portfolio = portfolio::where('id', $id)->where('user_id', Auth::id())->first();
        $portfolio->delete();
        return redirect()->back();
    }

    public function editport($id)
    {
        $portfolio = portfolio::where('id', $id)->where('user_id', Auth::id())->first();
        return view('alumni.layouts.editport', compact('portfolio'));
    }

    public function portedit(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'phone_number' => 'required|string|max:15',
            'profession' => 'required|string|max:255',
            'about_me' => 'required|string',
            'services.*.service' => 'required|string|max:255',
            'services.*.description' => 'nullable|string|max:200',
            'links.*.work_category' => 'nullable|string|max:255',
            'links.*.link' => 'nullable|string|max:255|url',
            'cv' => 'nullable|file|mimes:pdf,doc,docx', // Validate CV file
        ]);

        $portfolio = portfolio::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$portfolio) {
            return redirect()->route('portfolios.index')->with('error', 'Portfolio not found');
        }

        // Update portfolio details
        $portfolio->phone_number = $request->input('phone_number');
        $portfolio->profession = $request->input('profession');
        $portfolio->about_me = $request->input('about_me');

        // Handle CV file upload
        if ($request->hasFile('cv')) {
            // Delete the old CV if it exists
            if ($portfolio->cv && file_exists(storage_path('app/' . $portfolio->cv))) {
                unlink(storage_path('app/' . $portfolio->cv));
            }
            
            // Store the new CV file
            $cvPath = $request->file('cv')->store('cv_files');
            $portfolio->cv = $cvPath;
        }

        $portfolio->save();

        // Update services
        $portfolio->services()->delete();
        foreach ($request->input('services', []) as $service) {
            if (!empty($service['service'])) {
                $portfolio->services()->create([
                    'service' => $service['service'],
                    'description' => $service['description'] ?? null,
                ]);
            }
        }

        // Update links
        $portfolio->links()->delete();
        foreach ($request->input('links', []) as $link) {
            if (!empty($link['link'])) {
                $portfolio->links()->create([
                    'work_category' => $link['work_category'] ?? null,
                    'link' => $link['link'],
                ]);
            }
        }

        return redirect()->back()->with('success', 'Portfolio updated successfully!');
    }


    public function myportfolio()
    {
        $user = Auth::user();
        $portfolio = Portfolio::where('user_id', $user->id)->with(['services', 'links'])->first();
        return view('alumni.layouts.myportfolio',compact('user', 'portfolio'));
    }



    public function downloadCv($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if ($portfolio->cv) {
            $filePath = storage_path("app/{$portfolio->cv}");
            if (file_exists($filePath)) {
                return response()->download($filePath);
            } else {
                return redirect()->back()->with('error', 'CV file not found.');
            }
        }

        return redirect()->back()->with('error', 'CV not available.');
    }
    


    public function search_job(Request $request)
    {
        $search = $request -> search;
        $jobs = Istjob::where('company','LIKE','%'.$search.'%')->orWhere('location','LIKE','%'.$search.'%')->orWhere('position','LIKE','%'.$search.'%')->get();
        return view('alumni.layouts.postview',compact('jobs'));
    }
}
