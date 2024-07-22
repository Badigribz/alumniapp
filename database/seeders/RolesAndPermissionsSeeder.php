<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create Permissions
        $permissions = [
            'view-dashboard',
            'view-analytics',
            'view-role',
            'create-role',
            'update-role',
            'delete-role',
            'view-permission',
            'create-permission',
            'update-permission',
            'delete-permission',
            'view-user',
            'create-user',
            'update-user',
            'delete-user',
            'view-job',
            'create-job',
            'update-job',
            'create-portfolio',
            'publish-projects',
            'edit-projects',
            'delete-projects',
            'view-job-postings',
            'apply-for-jobs',
            'view-own-profile',
            'edit-profile',
            'view-own-applications',
            'create-job-posting',
            'view-alumni-profile',
            'view-alumni-projects',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create Roles and Assign Permissions
        $superuser = Role::create(['name' => 'superuser']);
        $admin = Role::create(['name' => 'admin']);
        $alumni = Role::create(['name' => 'alumni']);
        $employer = Role::create(['name' => 'employer']);

       $superuser->givePermissionTo(Permission::all());


        $admin->givePermissionTo([
            'view-role',
            'create-role',
            'update-role',
            'view-permission',
            'create-permission',
            'view-user',
            'create-user',
            'update-user',
            'view-job',
            'create-job',
            'update-job',
            'view-dashboard',
            'view-analytics',
        ]);

        $alumni->givePermissionTo([
            'create-portfolio',
            'publish-projects',
            'edit-projects',
            'delete-projects',
            'view-job-postings',
            'apply-for-jobs',
            'view-own-profile',
            'edit-profile',
            'view-own-applications',
            'view-dashboard',
            'view-analytics',
        ]);

        $employer->givePermissionTo([
            'create-job-posting',
            'view-alumni-profile',
            'view-alumni-projects',
            'view-analytics',

        ]);
    }
}

