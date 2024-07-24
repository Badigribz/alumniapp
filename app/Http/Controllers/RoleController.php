<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {

        $this->authorize('view', Role::class);
        $roles = Role::all();
        return view('super.layouts.viewrole', compact('roles'));
    }

    public function create()
    {
        $this->authorize('create', Role::class);
        $permissions = Permission::all();
        return view('super.layouts.addrole', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Role::class);

        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'array|exists:permissions,id',
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        $permissions = array_map('intval', $request->input('permissions', []));



        // Verify if the permissions exist in the database
        $existingPermissions = Permission::whereIn('id', $permissions)->pluck('id')->toArray();
        if (count($permissions) !== count($existingPermissions)) {

            return redirect()->back()->withErrors('Some permissions do not exist.');
        }

        $role->syncPermissions($permissions);

        return redirect()->route('viewrole')->with('success', 'Role created successfully.');
    }



    public function edit($id)
    {
        $this->authorize('update', Role::class);
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('super.layouts.editrole', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update', Role::class);

        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'permissions' => 'array|exists:permissions,id',
        ]);

        $role = Role::findOrFail($id);

        // Update role name
        $role->update(['name' => $request->input('name')]);

        // Convert permission IDs to integers
        $permissions = array_map('intval', $request->input('permissions', []));

        // Verify permissions exist
        $existingPermissions = Permission::whereIn('id', $permissions)->pluck('id')->toArray();
        if (count($permissions) !== count($existingPermissions)) {
            // Redirect back with error if some permissions do not exist
            return redirect()->back()->withErrors('Some permissions do not exist.');
        }

        // Sync permissions
        $role->syncPermissions($permissions);

        return redirect()->route('viewrole')->with('success', 'Role updated successfully.');
    }


    public function destroy($id)
    {
        $this->authorize('delete', Role::class);
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('viewrole')->with('success', 'Role deleted successfully.');
    }
}

