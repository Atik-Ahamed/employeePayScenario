@extends('layout')
@section('content')
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Employee ID</th>
                <th scope="col">Employee Name</th>
                <th scope="col">street_no</th>
                <th scope="col">street_name</th>
                <th scope="col">city</th>
                <th scope="col">zip_code</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>

            <tbody>
            @foreach($datas as $data)


                <tr>
                    <td>{{$data->emp_id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->street_no}}</td>
                    <td>{{$data->street_name}}</td>
                    <td>{{$data->city}}</td>
                    <td>{{$data->zip_code}}</td>
                    <td > <a class="btn btn-danger" href="{{url('/address/delete/'.$data->emp_id)}}">DELETE</a> </td>
                </tr>


            @endforeach
            </tbody>
        </table>


    </div>
@endsection