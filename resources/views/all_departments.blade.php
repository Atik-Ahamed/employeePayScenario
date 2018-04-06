@extends('layout')
@section('content')
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Department ID</th>
                <th scope="col">Department Name</th>
                <th scope="col">Department Location</th>
                <th scope="col">Department</th>

            </tr>
            </thead>

            <tbody>
            @foreach($datas as $data)


                <tr>
                    <td>{{$data->dept_id}}</td>
                    <td>{{$data->dept_name}}</td>
                    <td>{{$data->dept_location}}</td>
                    <td><a class="btn btn-danger" href="{{url('/delete_department/'.$data->dept_id)}}">DELETE</a> </td>

                </tr>


            @endforeach
            </tbody>
        </table>


    </div>
@endsection