@extends('layout')
@section('content')
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
                </div>
                <div class="form-group ">
                    <label>Basic
                        <input type="number" id="basic" name="basic" min="0" class="invisible" value="">
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
                    msg=JSON.parse(msg);

                    if (msg.type_of_work==='F') {
                        $('#basic').attr({
                            "class": "visible",
                            "min": 5000,
                            "value":msg.basic,
                            "disabled":false
                        });

                    }
                    else {
                        $('#basic').attr({
                            "class": "visible",
                            "min": 0,
                            "value":msg.basic,
                            "disabled":true
                        });
                    }
                }
            });


        });
    </script>
@endsection