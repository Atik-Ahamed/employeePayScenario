@extends('layout')
@section('content')
    <div class="container">
        <div class="col-md-12 col-md-offset-2">
            <form enctype="multipart/form-data" class="form-horizontal" method="GET"
                  action={{url('/query/2')}}>
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Project Name:
                        <input type="text" id="project_name" name="project_name" value="Googong Subdivision">
                    </label>

                </div>
                <div class="form-group">
                    <label>Project Location:
                        <input type="text" id="project_name" name="project_location" value="Googong">
                    </label>

                </div>
                <div class="form-group">
                    <label>Number Of Hours
                        <input type="number" id="num_of_hours" name="num_of_hours" value="20">
                    </label>

                </div>
                <h3>Date Between</h3>
                <div class="form-group">
                    <label>
                        <input type="date" id="post_date" name="pre_date" >
                    </label>

                </div>
                <h3>AND</h3>
                <div class="form-group">
                    <label>
                        <input type="date" id="post_date" name="post_date" >
                    </label>

                </div>
                <button type="submit" class="btn btn-primary">OK</button>

            </form>
        </div>
    </div>
@endsection