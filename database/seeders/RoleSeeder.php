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
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Estilista']);
        $role3 = Role::create(['name' => 'User']);


        Permission::create(['name' => 'admin.home',
                            'description'=> 'Ver el dashboard'])->syncRoles([$role1, $role2]);


        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Ver listado de usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.create',
                            'description' => 'Crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Asignar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy',
                            'description' => 'Eliminar usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.index',
                            'description' => 'Ver listado de Roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.roles.create',
                            'description' => 'Crear Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit',
                            'description' => 'Editar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy',
                            'description' => 'Eliminar Roless'])->syncRoles([$role1]);


        Permission::create(['name' => 'admin.products.index',
                            'description' => 'Ver listado de productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.products.create',
                            'description' => 'Agregar productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.products.edit',
                            'description' => 'Editar productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.products.destroy',
                            'description' => 'Eliminar productos'])->syncRoles([$role1, $role2]);


        Permission::create(['name' => 'admin.tips.index',
                            'description' => 'Ver listado de tips'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tips.create',
                            'description' => 'Agregar tips'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tips.edit',
                            'description' => 'Editar tips'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tips.destroy',
                            'description' => 'Eliminar tips'])->syncRoles([$role1, $role2]);
    }
}
