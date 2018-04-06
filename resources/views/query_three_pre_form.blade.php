@extends('layout')
@section('content')
    <div class="container">
        <div class="col-md-12 col-md-offset-2">
            <form enctype="multipart/form-data" class="form-horizontal" method="GET"
                  action={{url('/query/3')}}>
                {{ csrf_field() }}


                <div class="form-group">
                    <label>Project Location:
                        <input type="text" id="project_name" name="project_location" value="Burton Canberra">
                    </label>

                </div>
                <div class="form-group">
                    <label>Not Department Location:
                        <input type="text" id="project_name" name="dept_location" value="Canberra">
                    </label>

                </div>
                <button type="submit" class="btn btn-primary">OK</button>

            </form>
        </div>
    </div>
@endsection