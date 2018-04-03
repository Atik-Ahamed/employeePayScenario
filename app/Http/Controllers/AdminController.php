<?php

namespace App\Http\Controllers;

use App\Department;
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

}
