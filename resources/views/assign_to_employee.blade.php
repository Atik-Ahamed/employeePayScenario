@extends('admin.home')
@section('admin_content')
    <form enctype="multipart/form-data"  method="POST"
          action={{url('/assign_to_employee')}}>
        {{ csrf_field() }}
        <div class="form-group">
            <label>Employee ID:
                <input type="number" id="emp_id" name="emp_id">
            </label>
            <p id="employee_name"></p>
        </div>
        <div class="form-group">
            <label>Department ID:
                <input type="number" id="dept_id" name="dept_id">
            </label>
            <p id="department_name"></p>
        </div>
        <div class="form-group">
            <label for="type_of_work">Full Time Or Part Time</label>
            <select class="form-control" id="type_of_work" name="type_of_work">
                <option>F</option>
                <option>P</option>
            </select>
        </div>
        <div class="form-group">
            <label class="invisible" id="hourly_rate_label">Hourly Rate :
                <input type="number" id="hourly_rate" name="hourly_rate" min="25" max="60">
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>

    </form>

@endsection
@section('addscript')
    <script type="text/javascript">
        $('select[id="type_of_work"]').change(function () {
            if ($(this).val() === 'F') {
                $('#hourly_rate_label').attr('class', "invisible");
            }
            else {
                $('#hourly_rate_label').attr('class', "visible");
            }
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
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#employee_name').text("NOT FOUND");
                }
            });
        });

    </script>
@endsection