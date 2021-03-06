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

Route::get('/', function () {
     return view('index');
})->name("index");

Auth::routes();

Route::middleware('auth')->group(function () {

     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

     Route::group([
          'prefix' => 'users',
     ], function () {
          Route::get('/', 'UsersController@index')
               ->name('users.user.index');
          Route::get('/create', 'UsersController@create')
               ->name('users.user.create');
          Route::get('/show/{user}', 'UsersController@show')
               ->name('users.user.show')->where('id', '[0-9]+');
          Route::get('/{user}/edit', 'UsersController@edit')
               ->name('users.user.edit')->where('id', '[0-9]+');
          Route::post('/', 'UsersController@store')
               ->name('users.user.store');
          Route::put('user/{user}', 'UsersController@update')
               ->name('users.user.update')->where('id', '[0-9]+');
          Route::delete('/user/{user}', 'UsersController@destroy')
               ->name('users.user.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'roles',
     ], function () {
          Route::get('/', 'RolesController@index')
               ->name('roles.role.index');
          Route::get('/create', 'RolesController@create')
               ->name('roles.role.create');
          Route::get('/show/{role}', 'RolesController@show')
               ->name('roles.role.show')->where('id', '[0-9]+');
          Route::get('/{role}/edit', 'RolesController@edit')
               ->name('roles.role.edit')->where('id', '[0-9]+');
          Route::post('/', 'RolesController@store')
               ->name('roles.role.store');
          Route::put('role/{role}', 'RolesController@update')
               ->name('roles.role.update')->where('id', '[0-9]+');
          Route::delete('/role/{role}', 'RolesController@destroy')
               ->name('roles.role.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'permissions',
     ], function () {
          Route::get('/', 'PermissionsController@index')
               ->name('permissions.permission.index');
          Route::get('/create', 'PermissionsController@create')
               ->name('permissions.permission.create');
          Route::get('/show/{permission}', 'PermissionsController@show')
               ->name('permissions.permission.show')->where('id', '[0-9]+');
          Route::get('/{permission}/edit', 'PermissionsController@edit')
               ->name('permissions.permission.edit')->where('id', '[0-9]+');
          Route::post('/', 'PermissionsController@store')
               ->name('permissions.permission.store');
          Route::put('permission/{permission}', 'PermissionsController@update')
               ->name('permissions.permission.update')->where('id', '[0-9]+');
          Route::delete('/permission/{permission}', 'PermissionsController@destroy')
               ->name('permissions.permission.destroy')->where('id', '[0-9]+');
     });
});

Route::group([
     'prefix' => 'role_has_permissions',
], function () {
     Route::get('/', 'RoleHasPermissionsController@index')
          ->name('role_has_permissions.role_has_permission.index');
     Route::get('/create', 'RoleHasPermissionsController@create')
          ->name('role_has_permissions.role_has_permission.create');
     Route::get('/show/{permission}/{role}', 'RoleHasPermissionsController@show')
          ->name('role_has_permissions.role_has_permission.show')->where('id', '[0-9]+');
     Route::get('/manage/{role}', 'RoleHasPermissionsController@manage')
          ->name('role_has_permissions.role_has_permission.manage')->where('id', '[0-9]+');
     Route::get('/{permission}/{role}/edit', 'RoleHasPermissionsController@edit')
          ->name('role_has_permissions.role_has_permission.edit')->where('id', '[0-9]+');
     Route::post('/', 'RoleHasPermissionsController@store')
          ->name('role_has_permissions.role_has_permission.store');
     Route::put('role_has_permission/{permission}/{role}', 'RoleHasPermissionsController@update')
          ->name('role_has_permissions.role_has_permission.update')->where('id', '[0-9]+');
     Route::delete('/role_has_permission/{permission}/{role}', 'RoleHasPermissionsController@destroy')
          ->name('role_has_permissions.role_has_permission.destroy')->where('id', '[0-9]+');
});
