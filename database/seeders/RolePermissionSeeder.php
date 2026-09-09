<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [

            'view dashboard',

            'view users', 'create users', 'edit users', 'delete users',

            'view teachers', 'create teachers', 'edit teachers', 'delete teachers',

            'view students', 'create students', 'edit students', 'delete students',

            'view classes', 'create classes', 'edit classes', 'delete classes',

            'view class timing', 'create class timing', 'edit class timing', 'delete class timing',

            'view class days', 'create class days', 'edit class days', 'delete class days',

            'view attendance', 'create attendance', 'edit attendance', 'delete attendance',
            'mark attendance',

            'view assignments', 'create assignments', 'edit assignments',
            'delete assignments', 'grade assignments',

            'view assignment submissions', 'submit assignment',
            'edit assignment submission', 'delete assignment submission',

            'view settings', 'manage settings',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $admin->syncPermissions(Permission::all());

        $teacher = Role::firstOrCreate([
            'name' => 'teacher',
            'guard_name' => 'web'
        ]);
        
        $teacher->syncPermissions([
            'view dashboard',

            'view students',

            'view classes',
            'view class timing',
            'view class days',

            'view attendance',
            'create attendance',
            'edit attendance',
            'mark attendance',

            'view assignments',
            'create assignments',
            'edit assignments',
            'delete assignments',
            'grade assignments',

            'view assignment submissions',
        ]);
    }
}