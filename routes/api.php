<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});

Route::get('test',function(){
      return response([1,2,3,4],200);
     //return view('welcome');	
});

Route::post('userRegistration', 'ApiController@userRegistration');
Route::post('adminlogin', 'ApiController@adminlogin');
Route::post('vendorRegistration', 'ApiController@vendorRegistration');
Route::get('registrationView', 'ApiController@registrationView');
Route::get('identityProofDetails', 'ApiController@identityProofDetails');
Route::get('zone', 'ApiController@zone');
Route::get('category', 'ApiController@category');
Route::get('area', 'ApiController@area');
Route::get('vendorZonecategories', 'ApiController@vendorZonecategories');
Route::get('vendorView', 'ApiController@vendorView');






