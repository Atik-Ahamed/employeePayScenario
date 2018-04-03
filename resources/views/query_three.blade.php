@extends('layout')
@section('content')
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th class="font-italic" scope="col">Employee Name</th>
                <th class="font-italic" scope="col">Street No.</th>
                <th class="font-italic" scope="col">Street Name</th>
                <th class="font-italic" scope="col">City</th>
                <th class="font-italic" scope="col">Zip Code</th>
                <th class="font-italic" scope="col">Department Location</th>
                <th class="font-italic" scope="col">Project Location</th>
            </tr>
            </thead>

            <tbody>
            @foreach($datas as $data)


                <tr>

                    <td>{{$data->name}}</td>
                    <td>{{$data->street_no}}</td>
                    <td>{{$data->street_name}}</td>
                    <td>{{$data->city}}</td>
                    <td>{{$data->zip_code}}</td>
                    <td>{{$data->dept_location}}</td>
                    <td>{{$data->project_location}}</td>
                </tr>


            @endforeach
            </tbody>
        </table>


    </div>
@endsection