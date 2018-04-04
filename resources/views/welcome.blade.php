@extends('layout')
@section('content')
    <div class="container">
        <a class="btn btn-success" href="{{url('/query/1')}}" data-toggle="tooltip"
           title="List the names of all Engineers in Googong Subdivision Project located at Googong city">Query1</a>
        <a class="btn btn-success" href="{{url('/query/2')}}" data-toggle="tooltip"
           title="List the names of all Labour in Googong Subdivision project located at Googong city who work more than 20 hrs per week">Query2</a>
        <a class="btn btn-success" href="{{url('/query/3')}}" data-toggle="tooltip"
           title="Retrive the names and addresses of all employees who work on at least one project located in Burton Canberra but whose department has no location in Canberra">Query3</a>
        <a class="btn btn-success" href="{{url('/query/4')}}" data-toggle="tooltip"
           title="Retrive the names of employees who work on both the Googong Subdivision and Burton Highway project">Query4</a>
        <a class="btn btn-success" href="{{url('/query/5')}}" data-toggle="tooltip"
           title="Create a view which lists out the emp_name, dept_name, type_of_work, basic, allowance, deduction, salary from the above relational databases.">Query5</a>
        <br>
        @if(Auth::guard('admin')->check())
            <br>
            <a class="btn btn-success" href="{{url('/insert_department')}}">Insert Department</a>
            <a class="btn btn-success" href="{{url('/insert_project')}}">Insert Project</a>
            <a class="btn btn-success" href="{{url('/insert_ft_pt_work')}}">Insert Full Time Part Time Work</a>
            <a class="btn btn-success" href="{{url('/insert_salary')}}">Insert Salary</a>

            <br>
        @endif

    </div>
@endsection