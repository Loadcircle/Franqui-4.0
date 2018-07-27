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
    {
        /*
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
        */
        
        //Servicios
        
        Permission::create([
            'name'          => 'Navegar servicios',
            'slug'          => 'servicios.index',
            'description'   => 'Lista y navega todos los servicios del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de servicios',
            'slug'          => 'servicios.show',
            'description'   => 'Ver en detalle cada servicio',
        ]);
        Permission::create([
            'name'          => 'Creacion de servicios',
            'slug'          => 'servicios.create',
            'description'   => 'Crear servicios del sistema',
        ]);
        Permission::create([
            'name'          => 'Edicion de servicios',
            'slug'          => 'servicios.edit',
            'description'   => 'Editar todos los servicios del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar servicios',
            'slug'          => 'servicios.destroy',
            'description'   => 'Elimina los servicios del sistema',
        ]);

        //Modulos
        
        Permission::create([
            'name'          => 'Navegar modulos',
            'slug'          => 'modulos.index',
            'description'   => 'Lista y navega todos los modulos del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de modulos',
            'slug'          => 'modulos.show',
            'description'   => 'Ver en detalle cada modulos',
        ]);
        Permission::create([
            'name'          => 'Creacion de modulos',
            'slug'          => 'modulos.create',
            'description'   => 'Crear modulos del sistema',
        ]);
        Permission::create([
            'name'          => 'Edicion de modulos',
            'slug'          => 'modulos.edit',
            'description'   => 'Editar todos los modulos del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar modulos',
            'slug'          => 'modulos.destroy',
            'description'   => 'Elimina los modulos del sistema',
        ]);

        //Herramientas
        
        Permission::create([
            'name'          => 'Navegar herramientas',
            'slug'          => 'herramientas.index',
            'description'   => 'Lista y navega todas las herramientas del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de herramientas',
            'slug'          => 'herramientas.show',
            'description'   => 'Ver en detalle cada herramientas',
        ]);
        Permission::create([
            'name'          => 'Creacion de herramientas',
            'slug'          => 'herramientas.create',
            'description'   => 'Crear herramientas del sistema',
        ]);
        Permission::create([
            'name'          => 'Edicion de herramientas',
            'slug'          => 'herramientas.edit',
            'description'   => 'Editar todos los herramientas del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar herramientas',
            'slug'          => 'herramientas.destroy',
            'description'   => 'Elimina los herramientas del sistema',
        ]);

    }
}
