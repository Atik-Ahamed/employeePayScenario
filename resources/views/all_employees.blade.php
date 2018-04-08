@extends('layout')
@section('content')
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Employee ID</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Work Type</th>
                <th scope="con">Department ID</th>
                <th scope="col">Hourly Rate</th>
                <th scope="col">Email</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>

            <tbody>
            @foreach($datas as $data)


                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->type_of_work}}</td>
                    <td>{{$data->dept_id}}</td>
                    <td>{{$data->hourlyrate}}</td>
                    <td>{{$data->email}}</td>
                    <td><a class="btn btn-danger" href="{{url('/delete_employee/'.$data->id)}}">DELETE</a> </td>

                </tr>


            @endforeach
            </tbody>
        </table>


    </div>
@endsection