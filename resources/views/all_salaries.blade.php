@extends('layout')
@section('content')
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>

                <th scope="col">Employee ID</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Basic</th>
                <th scope="col">Net Salary</th>
                <th scope="col">Salary Date</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>

            <tbody>
            @foreach($datas as $data)


                <tr>
                    <td>{{$data->emp_id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->basic}}</td>
                    <td>{{$data->net_salary}}</td>
                    <td>{{$data->salary_date}}</td>
                    <td><a class="btn btn-danger" href="{{url('/delete_salary/'.$data->emp_id)}}">DELETE</a> </td>

                </tr>


            @endforeach
            </tbody>
        </table>


    </div>
@endsection