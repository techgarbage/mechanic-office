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
    return view('home');
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'permissionshinobi:access.admin']], function() {
    Route::get('users/datatable', 'UsersController@datatables')->name('datatables.users');
    Route::get('clients/datatable', 'ClientsController@datatables')->name('datatables.clients');
    Route::get('items/datatable', 'ItemsController@datatables')->name('datatables.items');
    Route::get('settings', 'SettingsController@index')->name('settings.index')->middleware('permissionshinobi:access.settings');
    Route::put('settings', 'SettingsController@update')->name('settings.update')->middleware('permissionshinobi:access.settings');
    Route::get('ingresos', 'AdminController@ingresos');
    Route::group(['middleware' => 'permissionshinobi:access.users'], function() {
        Route::resources([
            'users' => 'UsersController',
            'roles' => 'RolesController',
            'permissions' => 'PermissionsController',
        ]);
    });
	Route::resources([
        '/' => 'AdminController',
	    'clients' => 'ClientsController',
	    'invoices' => 'InvoicesController',
	    'vehicles' => 'VehiclesController',
        'brands' => 'BrandsController',
        'models' => 'ModelsController',
        'items' => 'ItemsController',
    ]);
});
Auth::routes();
Route::group(['middleware' => ['auth', 'permissionshinobi:show.own.invoices']], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/dashboard/{id}', 'DashboardController@show')->name('dashboard.show')->middleware('onlyowninvoices');
});


Route::get('/home', 'HomeController@index')->name('home');
