<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Full_time_part_time;
use App\Project;
use App\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function insert_dept(Request $request)
    {
        $dept = new Department();
        $dept->dept_name = $request->dept_name;
        $dept->dept_location = $request->dept_location;
        $dept->save();
        return redirect('/');
    }

    public function insert_project(Request $request)
    {
        $proj = new Project();
        $proj->project_name = $request->project_name;
        $proj->project_location = $request->project_location;
        $proj->save();
        return redirect('/');
    }

    public function insert_ft_pt_work(Request $request)
    {
        $ft_pt_work = new Full_time_part_time();
        $ft_pt_work->project_id = $request->project_id;
        $ft_pt_work->dept_id = $request->dept_id;
        $ft_pt_work->emp_id = $request->emp_id;
        $ft_pt_work->num_of_hours = $request->num_of_hours;
        $ft_pt_work->works_date = $request->works_date;
        $ft_pt_work->save();

        $emp = Employee::find($request->emp_id);
        if ($emp->type_of_work =='P') {
            $sal = Salary::find($request->emp_id);
            if ($sal == null) {
                $sal = new Salary();
                $sal->emp_id = $request->emp_id;
            }
            $query = DB::selectOne(" SELECT
                    SUM(
                      full_time_part_times.num_of_hours
                    ) AS hrs
                FROM
                    (
                    SELECT
                        full_time_part_times.num_of_hours
                    FROM
                        full_time_part_times
                    WHERE
                        full_time_part_times.emp_id = $request->emp_id
                        AND full_time_part_times.works_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()) full_time_part_times");

            $bas = $sal->basic = $query->hrs * $emp->hourlyrate;
            $sal->net_salary = $bas + 0.45 * $bas - (.09 * $bas + .15 * $bas);
            $sal->save();
            return redirect('/');
        }
    }

    public function insert_salary(Request $request)
    {
        $e = Employee::find($request->emp_id);
        if ($e->type_of_work == 'F') {
            $request->validate([
                'basic' => 'numeric|min:5000',
            ]);
        }
        $emp = Salary::find($request->emp_id);
        if ($emp == null) {
            $emp = new Salary();
        }
        $emp->emp_id = $request->emp_id;
        $bas = $emp->basic = $request->basic;
        $emp->net_salary = $bas + 0.45 * $bas - (.09 * $bas + .15 * $bas);
        $emp->salary_date = $request->salary_date;
        $emp->save();
        return redirect('/');
    }

    public function assign_to_employee(Request $request)
    {

        $emp = Employee::find($request->emp_id);
        $emp->dept_id = $request->dept_id;
        if ($request->type_of_work == "F") {
            $emp->type_of_work = 'F';
            $emp->hourlyrate = null;
        } else {
            $request->validate([
                'hourly_rate' => 'integer|required|min:25|max:60',

            ]);
            $emp->type_of_work = 'P';
            $emp->hourlyrate = $request->hourly_rate;
            $sal = Salary::find($request->emp_id);
            if ($sal == null) {
                $sal = new Salary();
                $sal->emp_id = $request->emp_id;
            }
            $query = DB::selectOne(" SELECT
                    SUM(
                      full_time_part_times.num_of_hours
                    ) AS hrs
                FROM
                    (
                    SELECT
                        full_time_part_times.num_of_hours
                    FROM
                        full_time_part_times
                    WHERE
                        full_time_part_times.emp_id = $request->emp_id
                        AND full_time_part_times.works_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE()) full_time_part_times");
            $bas = $sal->basic = $query->hrs * $request->hourly_rate;
            $sal->net_salary = $bas + 0.45 * $bas - (.09 * $bas + .15 * $bas);
            $sal->save();
        }
        $emp->save();
        return redirect('/');
    }


}
