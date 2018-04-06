@extends('admin.home')
@section('admin_content')
    <div class="container">
        <div class="col-md-12 col-md-offset-2">
            <form enctype="multipart/form-data" class="form-horizontal" method="POST"
                  action={{url('/insert_project')}}>
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Project Name
                        <input type="text" id="emp_name" name="project_name">
                    </label>
                </div>
                <div class="form-group">
                    <label>Project Location
                        <input type="text" id="emp_name" name="project_location">
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection