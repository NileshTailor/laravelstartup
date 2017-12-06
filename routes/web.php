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
 Route::get('/dashboard{m}', 'WelcomeController@index', function () {
    return view('welcome.index');
}); 
 Route::get('/enquiry/{id}', 'WelcomeController@memberIndex', function () {
    return view('memberdashboard.memberIndex');
});
 Route::get('/lead/{id}', 'WelcomeController@vendorIndex', function () {
    return view('vendordashboard.vendorIndex');
});


Route::get('user/memberEnquiry', 'USERController@memberEnquiry', function () {
    return view('user.memberEnquiry');
});
Route::post('memberEnquiry', 'USERController@addEnquiry');
Route::post('followupcomment', 'USERController@followupcomment');
Route::post('vendorfollowupcomment', 'USERController@vendorfollowupcomment');

Route::get('user/viewMemberEnquiry', 'USERController@viewMemberEnquiry', function () {
    return view('user.viewMemberEnquiry');
});
Route::get('vendorpart/adminCustomerLead', 'VendorController@adminCustomerLead', function () {
    return view('vendorpart.adminCustomerLead');
});
Route::post('enquirystatus', 'USERController@enquirystatus');

Route::resource('crud', 'CRUDController');
Route::resource('user', 'USERController');
Route::resource('vendorpart', 'VendorController');
Route::resource('admin', 'AdminLoginController');
Route::get('memberExcel/{type}', 'USERController@memberExcel');
Route::get('vendorExcel/{type}', 'vendorController@vendorExcel');
Route::get('enquiryExcel/{type}', 'USERController@enquiryExcel');
//Route::get('memberEnquiry', ['as' => 'memberEnquiry','uses'=>'USERController@memberEnquiry']);
Route::resource('zone', 'ZoneController');
Route::resource('category', 'CategoryController');
Route::resource('area', 'AreaController');
Route::resource('identityproof', 'IDENTITYPROOFController');
Route::get('addresses', function() {
return View::make('addresses')->with('address', Addresses::all());
});


Route::post('orderdata', 'USERController@orderdata');
