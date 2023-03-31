<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesandpermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'delete users']);


        Permission::create(['name' => 'list messages']);
        Permission::create(['name' => 'send messages']);
        Permission::create(['name' => 'delete messages']);


        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo(['list users', 'list messages', 'send messages']);

        // or may be done by chaining
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}