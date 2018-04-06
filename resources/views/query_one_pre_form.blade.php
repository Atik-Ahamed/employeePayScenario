@extends('layout')
@section('content')
    <div class="container">
        <div class="col-md-12 col-md-offset-2">
            <form enctype="multipart/form-data" class="form-horizontal" method="GET"
                  action={{url('/query/1')}}>
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
                <button type="submit" class="btn btn-primary">OK</button>

            </form>
        </div>
    </div>
@endsection