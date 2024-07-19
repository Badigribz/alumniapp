<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id())
        {
            $user_type = Auth()->user()->usertype;

            if ($user_type == 'super-admin') {
                
                return view('super.index');
            }else if ($user_type == 'admin') {
                
                return view('admin.index');
            }elseif ($user_type == 'alumni') {
                
                return view('alumni.index');
            }
            else {
                return redirect()->back();
            }
        }
    }
}
