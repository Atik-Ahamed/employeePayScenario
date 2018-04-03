<?php

namespace App\Http\Controllers;

use App\Address;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function get_employee_profile($emp_id)
    {
        $data = Employee::find($emp_id);
        $address=Address::find($emp_id);
        return view('employee.home')->with('data', $data)->with('address',$address);

    }

    public function employee_edit_profile($emp_id)
    {
        $data = Employee::find($emp_id);
        return view('employee.emp_edit_profile')->with('data', $data);
    }

    public function employee_update_profile($emp_id, Request $request)
    {
        $emp = Employee::find($emp_id);
        $emp->name = $request->emp_name;
        $emp->email = $request->emp_email;
        $emp->save();
        $add=Address::find($emp_id);
        $add->street_no=$request->emp_street_no;
        $add->street_name=$request->emp_street_name;
        $add->city=$request->emp_city;
        $add->save();
        $data = Employee::find($emp_id);
        return redirect(url('/employee/profile/'.$emp_id));

    }
}
