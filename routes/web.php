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

Route::get('/', 'CRUDController@index', function () {
    return view('crud.index');
});
Route::resource('crud', 'CRUDController');
Route::resource('user', 'USERController');

Route::get('addresses', function() {

return View::make('addresses')->with('address', Addresses::all());

});

