<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth',])->group(function(){
    Route::resource('empresas',         'Admin\EmpresaController');
    Route::get('empresas/{id}/servicio','Admin\EmpresaController@asignar')->name('empresas.asignar');
    Route::post('empresas/{id}',        'Admin\EmpresaController@saveasignar')->name('empresas.saveasignar');
    Route::resource('usuarios',         'Admin\UsuarioController');
    Route::resource('servicios',        'Admin\ServicioController');
    Route::get('modulos/{modulo}/move', 'Admin\ModuloController@move')->name('modulos.move');
    Route::post('modulos/{modulo}',     'Admin\ModuloController@saveMove')->name('modulos.saveMove');
    Route::resource('modulos',          'Admin\ModuloController');
    Route::resource('herramientas',     'Admin\HerramientaController');
    Route::get('accesos',               'Admin\AccesosController@index')->name('accesos.index');
    Route::get('accesos/{id}',          'Admin\AccesosController@show')->name('accesos.show');
    Route::resource('agendas',          'Admin\AgendaController');
    
    //submodulos
    Route::get('smodulos/{pmodulo}',    'Admin\SubmoduloController@index')->name('smodulos');
    Route::get('screate/{pmodulo}',     'Admin\SubmoduloController@create')->name('smodulos.create');
    Route::match(['get','post'],'sstore/{pmodulo}', 'Admin\SubmoduloController@store')->name('smodulos.store');
    Route::match(['get','post'],'sshow/{pmodulo}',  'Admin\SubmoduloController@show')->name('smodulos.show');
    Route::get('sedit/{pmodulo}',       'Admin\SubmoduloController@edit')->name('smodulos.edit');
    Route::put('supdate/{pmodulo}',     'Admin\SubmoduloController@update')->name('smodulos.update');
    Route::delete('sdestroy/{id}',      'Admin\SubmoduloController@destroy')->name('smodulos.destroy');
    Route::get('smodulos/{modulo}/move','Admin\SubmoduloController@move')->name('smodulos.move');
    Route::post('smodulos/{modulo}',    'Admin\SubmoduloController@saveMove')->name('smodulos.saveMove');

    //documentos de herramientas   
    Route::get('doc_herramientas/index/{id}',                   'Admin\HerramientaDocumentoController@index')->name('doc_herramientas.index');
    Route::get('doc_herramientas/create/{id}',                  'Admin\HerramientaDocumentoController@create')->name('doc_herramientas.create');
    Route::match(['get','post'],'doc_herramientas/store{id}',   'Admin\HerramientaDocumentoController@store')->name('doc_herramientas.store');
    Route::match(['get','post'],'doc_herramientas/show/{id}',   'Admin\HerramientaDocumentoController@show')->name('doc_herramientas.show');
    Route::get('doc_herramientas/edit{id}',                     'Admin\HerramientaDocumentoController@edit')->name('doc_herramientas.edit');
    Route::put('doc_herramientas/update{id}',                   'Admin\HerramientaDocumentoController@update')->name('doc_herramientas.update');
    Route::delete('doc_herramientas/destroy{id}',               'Admin\HerramientaDocumentoController@destroy')->name('doc_herramientas.destroy');

    //documentos de modulos   
    Route::get('doc_modulos/index/{id}',                        'Admin\ModuloDocumentoController@index')->name('doc_modulos.index');
    Route::get('doc_modulos/create/{id}',                       'Admin\ModuloDocumentoController@create')->name('doc_modulos.create');
    Route::match(['get','post'],'doc_modulos/store{id}',        'Admin\ModuloDocumentoController@store')->name('doc_modulos.store');
    Route::match(['get','post'],'doc_modulos/show/{id}',        'Admin\ModuloDocumentoController@show')->name('doc_modulos.show');
    Route::get('doc_modulos/edit{id}',                          'Admin\ModuloDocumentoController@edit')->name('doc_modulos.edit');
    Route::put('doc_modulos/update{id}',                        'Admin\ModuloDocumentoController@update')->name('doc_modulos.update');
    Route::delete('doc_modulos/destroy{id}',                    'Admin\ModuloDocumentoController@destroy')->name('doc_modulos.destroy');

    //roles
    Route::get('roles',                 'Admin\RoleController@index')->name('roles.index')
            ->middleware('permission:roles.index');

    Route::post('roles/store',          'Admin\RoleController@store')->name('roles.store')
            ->middleware('permission:roles.create');

    Route::get('roles/create',          'Admin\RoleController@create')->name('roles.create')
            ->middleware('permission:roles.create');

    Route::put('roles/{roles}',         'Admin\RoleController@update')->name('roles.update')
            ->middleware('permission:roles.edit');

    Route::get('roles/{roles}',         'Admin\RoleController@show')->name('roles.show')
            ->middleware('permission:roles.show');

    Route::delete('roles/{roles}',      'Admin\RoleController@destroy')->name('roles.destroy')
            ->middleware('permission:roles.destroy');

    Route::get('roles/{roles}/edit',    'Admin\RoleController@edit')->name('roles.edit')
            ->middleware('permission:roles.edit');







            
    //Cliente   
    Route::get('cliente/index',                               'ClienteController@index')->name('cliente.index');
//     Route::get('doc_modulos/create/{id}',                       'Admin\ModuloDocumentoController@create')->name('doc_modulos.create');
//     Route::match(['get','post'],'doc_modulos/store{id}',        'Admin\ModuloDocumentoController@store')->name('doc_modulos.store');
//     Route::match(['get','post'],'doc_modulos/show/{id}',        'Admin\ModuloDocumentoController@show')->name('doc_modulos.show');
//     Route::get('doc_modulos/edit{id}',                          'Admin\ModuloDocumentoController@edit')->name('doc_modulos.edit');
//     Route::put('doc_modulos/update{id}',                        'Admin\ModuloDocumentoController@update')->name('doc_modulos.update');
//     Route::delete('doc_modulos/destroy{id}',                    'Admin\ModuloDocumentoController@destroy')->name('doc_modulos.destroy');

});