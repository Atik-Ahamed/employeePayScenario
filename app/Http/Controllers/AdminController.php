<?php

namespace App\Http\Controllers;

use App\Department;
use App\Full_time_part_time;
use App\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function insert_dept(Request $request)
    {
        $dept=new Department();
        $dept->dept_name=$request->dept_name;
        $dept->dept_location=$request->dept_location;
        $dept->save();
        return redirect('/');
    }
    public function  insert_project(Request $request){
        $proj=new Project();
        $proj->project_name=$request->project_name;
        $proj->project_location=$request->project_location;
        $proj->save();
        return redirect('/');
    }
    public function insert_ft_pt_work(Request $request){
        $ft_pt_work=new Full_time_part_time();
        $ft_pt_work->project_id=$request->project_id;
        $ft_pt_work->emp_id=$request->emp_id;
        $ft_pt_work->num_of_hours=$request->num_of_hours;
        $ft_pt_work->works_date=$request->works_date;
        $ft_pt_work->save();
        return redirect('/');
    }
    public function insert_salary(){


        return redirect('/');
    }

}
