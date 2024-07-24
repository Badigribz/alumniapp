<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $this->authorize('view', Permission::class);
        $permissions = Permission::all();
        return view('super.layouts.viewpermission', compact('permissions'));
    }

    public function create()
    {
        $this->authorize('create', Permission::class);
        return view('super.layouts.addpermission');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Permission::class);
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->input('name')]);

        return redirect()->route('viewpermission')->with('success', 'Permission created successfully.');
    }

    public function edit($id)
    {
        $this->authorize('update', Permission::class);
        $permission = Permission::findOrFail($id);
        return view('super.layouts.editpermission', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update', Permission::class);
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update(['name' => $request->input('name')]);

        return redirect()->route('viewpermission')->with('success', 'Permission updated successfully.');
    }

    public function destroy($id)
    {
        $this->authorize('delete', Permission::class);
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('viewpermission')->with('success', 'Permission deleted successfully.');
    }
}

