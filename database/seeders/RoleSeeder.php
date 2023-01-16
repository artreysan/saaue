<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Editor']);
        $role3 = Role::create(['name' => 'Externo']);

        Permission::create(['name' => '/register'])->assignRole($role1);
        Permission::create(['name' => '/login'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'Ver Dashboard'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => '/petition/register'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => '/petition/home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => '/collaborators/register'])->assignRole($role3);
        Permission::create(['name' => '/collaborators/home'])->assignRole($role1);

        Permission::create(['name' => '/projects/home'])->assignRole($role1);

        Permission::create(['name' => '/equipment/register'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => '/equipment/home'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => '/enterprises/register'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => '/enterprises/home'])->syncRoles([$role1, $role2]);


    }
}
