@extends('admin.home')
@section('admin_content')
    <div class="container">
        <div class="col-md-12 col-md-offset-2">
            <form enctype="multipart/form-data" class="form-horizontal" method="POST"
                  action={{url('/insert_salary')}}>
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Employee ID:
                        <input type="number" id="emp_id" name="emp_id" min="1">
                    </label>
                    <a href="#" class="btn btn-warning" id="sure">SURE?</a>
                    <p id="employee_name"></p>
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
                        <input type="date" id="salary_date" name="salary_date">
                    </label>

                </div>


                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection
@section('addscript')
    <script type="text/javascript">

        $('#sure').click(function () {
            var get_url = '{{url('/get_salary')}}';
            get_url = get_url + '/' + $('#emp_id').val();
            $.ajax({
                type: "GET",
                url: get_url,
                data: {

                    _token: $('meta[name=csrf-token]').attr('content')
                },
                success: function (msg) {
                    msg = JSON.parse(msg);

                    if (msg.type_of_work === 'F') {
                        $('#basic').attr({
                            "class": "visible",
                            "min": 5000,
                            "readonly": false
                        });
                        $('#net_salary').attr({
                            "class": "visible",
                             "readonly": true
                        });
                        document.getElementById("basic").value=msg.basic;
                        document.getElementById("net_salary").value=msg.basic + 0.45 * msg.basic - (.09 * msg.basic + .15 * msg.basic);
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
                        document.getElementById("basic").value=msg.basic;
                        document.getElementById("net_salary").value=msg.basic + 0.45 * msg.basic - (.09 * msg.basic + .15 * msg.basic);

                    }
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
                },
                error: function(xhr, textStatus, errorThrown){
                    $('#employee_name').text("NOT FOUND");
                }
            });
        });
    </script>
@endsection