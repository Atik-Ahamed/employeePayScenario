@extends('layout')
@section('content')
    <div class="container">
        <div class="col-md-12 col-md-offset-2">
            <form enctype="multipart/form-data" class="form-horizontal" method="POST"
                  action={{url('/employee/update_profile/'.\Illuminate\Support\Facades\Auth::guard('employee')->user()->id)}}>
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Employee Name
                        <input type="text" id="emp_name" name="emp_name" value="{{$data->name}}">
                    </label>
                </div>
                <div class="form-group">
                    <label>Email
                        <input type="text" id="emp_email" name="emp_email" value="{{$data->email}}">
                    </label>
                </div>
                <div class="form-group">
                    <label>street no.
                        <input type="text" id="emp_email" name="emp_street_no" >
                    </label>
                </div>
                <div class="form-group">
                    <label>street name:
                        <input type="text" id="emp_email" name="emp_street_name" >
                    </label>
                </div>
                <div class="form-group">
                    <label>city:
                        <input type="text" id="emp_email" name="emp_city" >
                    </label>
                </div>
                <div class="form-group">
                    <label>zip code:
                        <input type="text" id="emp_email" name="emp_zip_code" >
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection