@extends('layout')

@section('content')

    <div id="main-container">
        <!-- Left Menu -->
        <div class="dark-menu">
            <a class="" href="{{url('/insert_department')}}">Insert Department</a>
            <a class="" href="{{url('/insert_project')}}">Insert Project</a>
            <a class="" href="{{url('/insert_ft_pt_work')}}">Insert Full Time Part Time Work</a>
            <a class="" href="{{url('/insert_salary')}}">Insert Salary</a>
            <a class="" href="{{url('/assign_to_employee')}}">Assign To Employee</a>

        </div>
        <!-- END Left Menu -->


        <!-- END Left Menu -->


        <div id="content">

            @yield('admin_content')
        </div>
    </div>



@endsection
