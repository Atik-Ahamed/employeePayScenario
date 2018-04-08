@extends('layout')
@section('content')
    <div class="container">
        <!-- Jumbotron Header -->
        <header class="jumbotron my-4" >
            <h1 class="display-3 text-center" style="font-family: 'Comic Sans MS';">Employee Pay Scenario</h1>


        </header>


        <div class="row text-center">

            <div class="col-lg-3 col-md-6 mb-4 ">
                <div class="card">
                    <div class="card-body">
                        <h2 class="btn btn-warning card-title ">QUERY ONE</h2>
                        <p class="card-text">List the names of all Engineers in Googong Subdivision Project located at Googong city</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{url('/query_preform/1')}}" class="btn btn-success">Perform Query</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 ">
                <div class="card">
                    <div class="card-body">
                        <h2 class="btn btn-warning card-title ">QUERY TWO</h2>
                        <p class="card-text">List the names of all Labour in Googong Subdivision project located at Googong city who work more than 20 hrs per week</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{url('/query_preform/2')}}" class="btn btn-success">Perform Query</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 ">
                <div class="card">
                    <div class="card-body">
                        <h2 class="btn btn-warning card-title ">QUERY THREE</h2>
                        <p class="card-text">Retrive the names and addresses of all employees who work on at least one project located in Burton Canberra but whose department has no location in Canberra</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{url('/query_preform/3')}}" class="btn btn-success">Perform Query</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 ">
                <div class="card">
                    <div class="card-body">
                        <h2 class="btn btn-warning card-title">QUERY FOUR</h2>
                        <p class="card-text">Retrive the names of employees who work on both the Googong Subdivision and Burton Highway project</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{url('/query_preform/4')}}" class="btn btn-success">Perform Query</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 ">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="btn btn-warning card-title ">QUERY FIVE</h2>
                        <p class="card-text"> Create a view which lists out the emp_name, dept_name, type_of_work, basic, allowance, deduction, salary from the above relational databases.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{url('/query/5')}}" class="btn btn-success">Perform Query</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
        <br>


    </div>
@endsection