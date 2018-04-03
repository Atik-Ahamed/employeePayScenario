@extends('layout')
@section('content')
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Employee Name</th>
                <th scope="col">Department Name</th>
                <th scope="col">Type Of Work</th>
                <th scope="col">Basic</th>
                <th scope="col">Allowence</th>
                <th scope="col">Deduction</th>
                <th scope="col">Net Salary</th>
            </tr>
            </thead>

            <tbody>
            @foreach($datas as $data)


                <tr>

                    <td>{{$data->name}}</td>
                    <td>{{$data->dept_name}}</td>
                    <td>{{$data->type_of_work}}</td>
                    <td>{{$data->basic}}</td>
                    <td>{{$data->ALLOWENCE}}</td>
                    <td>{{$data->Deduction}}</td>
                    <td>{{$data->net_salary}}</td>
                </tr>


            @endforeach
            </tbody>
        </table>


    </div>
@endsection