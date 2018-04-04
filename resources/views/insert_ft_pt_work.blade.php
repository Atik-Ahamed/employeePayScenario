@extends('layout')
@section('content')
    <div class="container">
        <div class="col-md-12 col-md-offset-2">
            <form enctype="multipart/form-data" class="form-horizontal" method="POST"
                  action={{url('/insert_ft_pt_work')}}>
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Project ID:
                        <input type="number" id="emp_name" name="project_id">
                    </label>
                </div>
                <div class="form-group">
                    <label>Employee ID:
                        <input type="number" id="emp_name" name="emp_id">
                    </label>
                </div>
                <div class="form-group">
                    <label>Department ID:
                        <input type="number" id="emp_name" name="dept_id">
                    </label>
                </div>
                <div class="form-group">
                    <label>Number of Hours:
                        <input type="number" id="emp_name" name="num_of_hours" min="1" max="8">
                    </label>
                </div>
                <div class="form-group">
                    <label>Works Date:
                        <input type="date" id="emp_name" name="works_date">
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection