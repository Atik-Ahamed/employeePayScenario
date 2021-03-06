@extends('admin.home')
@section('admin_content')
    <div class="container">
        <div class="col-md-12 col-md-offset-2">
            <form enctype="multipart/form-data" class="form-horizontal" method="POST"
                  action={{url('/insert_department')}}>
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Department Name
                        <input type="text" id="emp_name" name="dept_name" required>
                    </label>
                </div>
                <div class="form-group">
                    <label>Department Location
                        <input type="text" id="emp_name" name="dept_location" required>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection