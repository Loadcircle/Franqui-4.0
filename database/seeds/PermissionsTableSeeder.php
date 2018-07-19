<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {/*
        //Empresas
        Permission::create([
            'name'          => 'Crear Empresas',
            'slug'          => 'empresas.create',
            'description'   => 'Crea empresas',
        ]);
        Permission::create([
            'name'          => 'Navegar Empresas',
            'slug'          => 'empresas.index',
            'description'   => 'Lista y navega las empresas',
        ]);
        Permission::create([
            'name'          => 'Ver detalles de Empresas',
            'slug'          => 'empresas.show',
            'description'   => 'Detalla las empresas',
        ]);
        Permission::create([
            'name'          => 'Editar Empresas',
            'slug'          => 'empresas.edit',
            'description'   => 'Edita las empresas',
        ]);
        Permission::create([
            'name'          => 'Eliminar Empresas',
            'slug'          => 'empresas.destroy',
            'description'   => 'Elimina las empresas',
        ]);

        //Usuarios
        Permission::create([
            'name'          => 'Crear Usuarios',
            'slug'          => 'usuarios.create',
            'description'   => 'Crea usuarios',
        ]);
        Permission::create([
            'name'          => 'Navegar Usuarios',
            'slug'          => 'usuarios.index',
            'description'   => 'Lista y navega los usuarios',
        ]);
        Permission::create([
            'name'          => 'Ver detalles de Usuarios',
            'slug'          => 'usuarios.show',
            'description'   => 'Detalla los usuarios',
        ]);
        Permission::create([
            'name'          => 'Editar Usuarios',
            'slug'          => 'usuarios.edit',
            'description'   => 'Edita los usuarios',
        ]);
        Permission::create([
            'name'          => 'Eliminar Usuarios',
            'slug'          => 'usuarios.destroy',
            'description'   => 'Elimina los usuarios',
        ]);
        */
        //Roles
        
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de rol',
            'slug'          => 'roles.show',
            'description'   => 'Ver en detalle cada usuario',
        ]);
        Permission::create([
            'name'          => 'Creacion de roles',
            'slug'          => 'roles.create',
            'description'   => 'Editar todos los rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Edicion de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Editar todos los rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Elimina los rol del sistema',
        ]);

    }
}
