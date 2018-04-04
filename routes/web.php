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
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'employee'], function () {
  Route::get('/login', 'EmployeeAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'EmployeeAuth\LoginController@login');
  Route::post('/logout', 'EmployeeAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'EmployeeAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'EmployeeAuth\RegisterController@register');

  Route::post('/password/email', 'EmployeeAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'EmployeeAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'EmployeeAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'EmployeeAuth\ResetPasswordController@showResetForm');
  Route::get('/profile/{id}','EmployeeController@get_employee_profile');
  Route::get('/edit_profile/{id}','EmployeeController@employee_edit_profile');
  Route::post('/update_profile/{id}','EmployeeController@employee_update_profile');

});
Route::get('/query/1','QueryController@query1');
Route::get('/query/2','QueryController@query2');
Route::get('/query/3','QueryController@query3');
Route::get('/query/4','QueryController@query4');
Route::get('/query/5','QueryController@query5');
Route::get('/input','QueryController@input');
Route::get('/insert_department',function (){
    return view('insert_dept');
});
Route::post('/insert_department','AdminController@insert_dept');

Route::get('/insert_project',function (){
    return view('insert_project');
});
Route::post('/insert_project','AdminController@insert_project');

Route::get('/insert_ft_pt_work',function (){
    return view('insert_ft_pt_work');
});
Route::post('/insert_ft_pt_work','AdminController@insert_ft_pt_work');
Route::get('/insert_salary',function (){
    return view('insert_salary');
});
Route::get('/get_salary/{emp_id}','QueryController@get_salary');