@extends('admin.home')
@section('admin_content')
    <div class="container">
        <div class="col-md-12 col-md-offset-2">
            <form enctype="multipart/form-data" class="form-horizontal" method="POST"
                  action={{url('/insert_ft_pt_work')}}>
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Project ID:
                        <input type="number" id="project_id" name="project_id">
                    </label>
                    <p id="project_name"></p>
                </div>
                <div class="form-group">
                    <label>Employee ID:
                        <input type="number" id="emp_id" name="emp_id">
                    </label>
                    <p id="employee_name"></p>
                </div>
                <div class="form-group">
                    <label>Department ID:
                        <input type="number" id="dept_id" name="dept_id">
                        <p id="department_name"></p>

                    </label>

                </div>
                <div class="form-group">
                    <label>Number of Hours:
                        <input type="number" id="num_of_hours" name="num_of_hours" min="1" max="8">
                    </label>
                </div>
                <div class="form-group">
                    <label>Works Date:
                        <input type="date" id="works_date" name="works_date">
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection
@section('addscript')
    <script type="text/javascript">
        $('#project_id').change(function () {
            var get_url = '{{url('/get_project_name')}}';
            get_url = get_url + '/' + $('#project_id').val();

            $.ajax({
                type: "GET",
                url: get_url,
                data: {

                    _token: $('meta[name=csrf-token]').attr('content')
                },
                success: function (msg) {

                    $('#project_name').text(msg);
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#project_name').text("NOT FOUND");
                }
            });
        });
        $('#dept_id').change(function () {
            var get_url = '{{url('/get_department_name')}}';
            get_url = get_url + '/' + $('#dept_id').val();

            $.ajax({
                type: "GET",
                url: get_url,
                data: {

                    _token: $('meta[name=csrf-token]').attr('content')
                },
                success: function (msg) {

                    $('#department_name').text(msg);
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#department_name').text("NOT FOUND");
                }
            });
        });

        $('#emp_id').change(function () {
            var get_url = '{{url('/get_employee_name')}}';
            get_url = get_url + '/' + $('#emp_id').val();

            $.ajax({
                type: "GET",
                url: get_url,
                data: {

                    _token: $('meta[name=csrf-token]').attr('content')
                },
                success: function (msg) {

                    $('#employee_name').text(msg);
                    var new_get_url = '{{url('/get_type_of_work')}}';
                    new_get_url = new_get_url + '/' + $('#emp_id').val();
                    $.ajax({
                        type: "GET",
                        url: new_get_url,
                        data: {

                            _token: $('meta[name=csrf-token]').attr('content')
                        },
                        success: function (tp) {

                            if (tp=== 'F') {
                                $('#num_of_hours').attr({
                                    "value": 8,
                                    "readonly": true
                                });
                            }
                            else {
                                $('#num_of_hours').attr({
                                    "readonly": false
                                });

                            }
                        }
                    });


                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#employee_name').text("NOT FOUND");
                }
            })
            ;
        })
        ;


    </script>
@endsection