@extends('layout')
@section('content')
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Project ID</th>
                <th scope="col">Project Name</th>
                <th scope="col">Employee ID</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Department ID</th>
                <th scope="col">Department Name</th>
                <th scope="col">Num. Of Hours</th>
                <th scope="col">Works Date</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>

            <tbody>
            @foreach($datas as $data)


                <tr>
                    <td>{{$data->project_id}}</td>
                    <td>{{$data->project_name}}</td>
                    <td>{{$data->emp_id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->dept_id}}</td>
                    <td>{{$data->dept_name}}</td>
                    <td>{{$data->num_of_hours}}</td>
                    <td>{{$data->works_date}}</td>
                    <td><a class="btn btn-danger" href="{{url('/delete_ft_pt/'.$data->id)}}">DELETE</a> </td>

                </tr>


            @endforeach
            </tbody>
        </table>


    </div>
@endsection