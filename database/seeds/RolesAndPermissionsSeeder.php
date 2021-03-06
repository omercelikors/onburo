<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'recorder']);
        $role3 = Role::create(['name' => 'recruitment_recorder']);
    }
}
