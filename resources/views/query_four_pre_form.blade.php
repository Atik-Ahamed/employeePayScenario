@extends('layout')
@section('content')
    <div class="container">
        <div class="col-md-12 col-md-offset-2">
            <form enctype="multipart/form-data" class="form-horizontal" method="GET"
                  action={{url('/query/4')}}>
                {{ csrf_field() }}
                <h3>Works Both in </h3>

                <div class="form-group">
                    <label>Project Name:
                        <input type="text" id="project_name1" name="project_name1" value="Googong Subdivision">
                    </label>
<h3>And</h3>
                </div>
                <div class="form-group">
                    <label>Project Name:
                        <input type="text" id="project_name2" name="project_name2" value="Burton Highway">
                    </label>

                </div>
                <button type="submit" class="btn btn-primary">OK</button>

            </form>
        </div>
    </div>
@endsection