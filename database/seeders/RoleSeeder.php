<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Usuario']);
        Role::create(['name' => 'Propietario']);
        Role::create(['name' => 'Agente']);

        $admin = Role::findByName('Admin');
        $admin->givePermissionTo([Permission::all()]);

        $usuario = Role::findByName('Usuario');
        $usuario->givePermissionTo([
            'ver inmueble',
            'ver perfil',
            'crear propietario',
            'ver usuario'
        ]);

        $agente = Role::findByName('Agente');
        $agente->givePermissionTo([
            'ver inmueble',
            'crear inmueble',
            'editar inmueble',
            'borrar inmueble',
            'ver perfil',
            'editar perfil',
            'borrar perfil',
            'crear perfil',
            'ver propietario',
            'crear propietario',
            'editar propietario',
            'borrar propietario',
            'ver usuario'
        ]);

        $propietario = Role::findByName('Propietario');
        $propietario->givePermissionTo([
                'ver inmueble',
                'crear inmueble',
                'editar inmueble',
                'borrar inmueble',
                'ver perfil',
                'editar perfil',
                'borrar perfil',
                'crear perfil',
                'ver propietario',
                'editar propietario',
                'borrar propietario',
                'ver usuario',
                'editar usuario',
                'borrar usuario',
                'crear usuario'
            ]);
    }
}
