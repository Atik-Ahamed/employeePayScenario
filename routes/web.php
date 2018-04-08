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

use App\Department;
use App\Employee;
use App\Project;

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

Route::get('/query_preform/1',function (){
    return view('query_one_pre_form');
});
Route::get('/query_preform/2',function (){
    return view('query_two_pre_form');
});
Route::get('/query_preform/3',function (){
    return view('query_three_pre_form');
});
Route::get('/query_preform/4',function (){
    return view('query_four_pre_form');
});





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
Route::post('/insert_salary','AdminController@insert_salary');
Route::get('/get_salary/{emp_id}','QueryController@get_salary');
Route::get('/assign_to_employee',function (){
    return view('assign_to_employee');
});
Route::post('assign_to_employee','AdminController@assign_to_employee');
Route::get('/get_project_name/{id}','QueryController@get_project_name');
Route::get('/get_employee_name/{id}','QueryController@get_employee_name');
Route::get('/get_department_name/{id}','QueryController@get_department_name');
Route::get('/get_type_of_work/{id}','QueryController@get_type_of_work');
Route::get('/all_employees',function (){
    $emp=Employee::all();
    return view('all_employees')->with('datas',$emp);
});
Route::get('/all_departments',function (){
    $dept=Department::all();
    return view('all_departments')->with('datas',$dept);
});
Route::get('/all_projects',function (){
    $proj=Project::all();
    return view('all_projects')->with('datas',$proj);
});
Route::get('/all_salaries',function (){
    $sal=DB::select("SELECT
    employees.name,
    salaries.emp_id,
    salaries.basic,
    salaries.net_salary,
    salaries.salary_date
FROM
    employees,
    salaries
WHERE
    employees.id = salaries.emp_id");
    return view('all_salaries')->with('datas',$sal);
});
Route::get('/all_addresses',function (){
    $ad=DB::select("SELECT
    employees.name,
    addresses.emp_id,
    addresses.street_no,
    addresses.street_name,
    addresses.city,
    addresses.zip_code
FROM
    employees,
    addresses
WHERE
    employees.id = addresses.emp_id");
    return view('all_addresses')->with('datas',$ad);
});
Route::get('/all_ft_pt',function (){
    $ftpt=DB::select("SELECT
   employees.name,
   full_time_part_times.id,
   full_time_part_times.emp_id,
   full_time_part_times.project_id,
   full_time_part_times.dept_id,
   full_time_part_times.num_of_hours,
   full_time_part_times.works_date,
   projects.project_name,
   departments.dept_name
FROM
    employees,
    full_time_part_times,
    projects,
    departments
WHERE
    employees.id = full_time_part_times.emp_id
     AND projects.project_id=full_time_part_times.project_id
      AND full_time_part_times.dept_id=departments.dept_id");
    return view('all_ft_pt')->with('datas',$ftpt);
});
Route::get('/address/delete/{emp_id}','QueryController@delete_address');
Route::get('/delete_department/{emp_id}','QueryController@delete_department');
Route::get('/delete_employee/{emp_id}','QueryController@delete_employee');
Route::get('/delete_project/{id}','QueryController@delete_project');
Route::get('/delete_salary/{id}','QueryController@delete_salary');
Route::get('/delete_ft_pt/{id}','QueryController@delete_ft_pt');
Route::get('/get_part_time_basic/{id}','QueryController@get_part_time_basic');

