@extends('admin.home')
@section('admin_content')
    <div class="container">
        <div class="col-md-12 col-md-offset-2">
            <form enctype="multipart/form-data" class="form-horizontal" method="POST"
                  action={{url('/insert_salary')}}>
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Employee ID:
                        <input type="number" id="emp_id" name="emp_id" min="1" required>
                    </label>

                    <p id="employee_name" class="font-weight-bold font-italic"></p>
                </div>
                <div class="form-group ">
                    <label>Basic
                        <input type="number" id="basic" name="basic" min="0" class="invisible" value="">
                    </label>

                </div>
                <div class="form-group ">
                    <label>Net Salary
                        <input type="number" id="net_salary" name="net_salary" min="0" class="invisible" value="">
                    </label>

                </div>
                <div class="form-group ">
                    <label>Salary Date:
                        <input type="date" id="salary_date" name="salary_date" required>
                    </label>

                </div>


                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection
@section('addscript')
    <script type="text/javascript">


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
                        success: function (msg) {


                            if (msg === 'F') {
                                $('#basic').attr({
                                    "class": "visible",
                                    "min": 5000,
                                    "readonly": false
                                });
                                $('#net_salary').attr({
                                    "class": "visible",
                                    "readonly": true


                                });
                                document.getElementById("basic").value = 5000;

                                var bas = document.getElementById("basic").value;
                                bas = Number(bas);
                                document.getElementById("net_salary").value = bas + (0.45 * bas) - (.09 * bas + (.15 * bas));

                            }
                            else {
                                $('#basic').attr({
                                    "class": "visible",
                                    "min": 0,
                                    "readonly": true
                                });
                                $('#net_salary').attr({
                                    "class": "visible",
                                    "readonly": true
                                });
                                var url_for_part_time = '{{url('/get_part_time_basic')}}';
                                url_for_part_time = url_for_part_time + '/' + $('#emp_id').val();
                                $.ajax({
                                    type: "GET",
                                    url: url_for_part_time,
                                    data: {

                                        _token: $('meta[name=csrf-token]').attr('content')
                                    },
                                    success: function (pt_basic) {
                                        document.getElementById("basic").value = pt_basic;
                                        var bas = $('#basic').val();
                                        bas = Number(bas);
                                        document.getElementById("net_salary").value = bas + (0.45 * bas) - (.09 * bas + (.15 * bas));

                                    }
                                });
                            }
                        }
                    });


                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#employee_name').text("NOT FOUND");
                }
            });
        });
        $('#basic').keyup(function () {
            var bas = $(this).val();
            bas = Number(bas);
            document.getElementById("net_salary").value = bas + (0.45 * bas) - (.09 * bas + (.15 * bas));


        });

    </script>
@endsection