<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{


    public function index()
    {
        // Use policy to check permission
        $this->authorize('view', User::class);

        // Fetch and return a list of users
        $users = User::all();
        return view('super.layouts.viewuser', compact('users'));
    }

    public function edit($id)
  {
    $user = User::findOrFail($id);
    $this->authorize('update', $user);
    $roles = Role::all(); // Fetch all roles
    return view('super.layouts.edituser', compact('user', 'roles'));
   }


   public function update(Request $request, $id)
   {
    $user = User::findOrFail($id);
    $this->authorize('update', $user);
       $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|email|unique:users,email,' . $id,
           'role' => 'required|exists:roles,id', // Ensure a valid role is selected
       ]);

       $user = User::findOrFail($id);
       $user->name = $request->input('name');
       $user->email = $request->input('email');

       // Fetch the selected role ID from the request
       $roleId = $request->input('role');

       // Find the role name based on the selected role ID
       $role = Role::findOrFail($roleId);

       // Assign the role to the user and update the usertype column
       $user->syncRoles([$role->name]);
       $user->usertype = $role->name; // Update the usertype column with the role name
       $user->save();

       return redirect()->route('viewuser')->with('success', 'User updated successfully.');
   }


   public function store(Request $request)
   {
    $this->authorize('create', User::class);
       // Validate the incoming request
       $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|email|unique:users,email',
           'role' => 'required|exists:roles,id', // Validate a single role ID
           'password' => 'required|string|min:8|confirmed',
       ]);



       // Find the role by ID and get its name
       $roleId = $request->input('role');
       $role = Role::findOrFail($roleId);
       $roleName = $role->name;

       // Create the user
        $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')), // Hash the password
                'usertype' => $roleName, // Store the role ID in `usertype`
         ]);

       // Assign the role to the user
       $user->assignRole($roleName);

       return redirect()->route('viewuser')->with('success', 'User created successfully.');
   }

   public function destroy(User $user)
   {
    $this->authorize('delete', $user);
       // Check if the user has any roles and remove them if necessary
       $user->roles()->detach(); // Detach all roles associated with the user

       // Delete the user
       $user->delete();

       // Redirect with a success message
       return redirect()->route('viewuser')->with('success', 'User deleted successfully.');
   }



}
