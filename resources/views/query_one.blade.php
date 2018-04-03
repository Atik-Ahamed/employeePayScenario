@extends('layout')
@section('content')
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Employee Name</th>
                <th scope="col">Project Name</th>
                <th scope="col">Project Location</th>
                <th scope="col">dept name</th>
            </tr>
            </thead>

            <tbody>
        @foreach($datas as $data)


                <tr>

                    <td>{{$data->name}}</td>
                    <td>{{$data->project_name}}</td>
                    <td>{{$data->project_location}}</td>
                    <td>{{$data->dept_name}}</td>
                </tr>


        @endforeach
            </tbody>
        </table>


    </div>
@endsection