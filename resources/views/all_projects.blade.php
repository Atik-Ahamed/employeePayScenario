@extends('layout')
@section('content')
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Project ID</th>
                <th scope="col">Project Name</th>
                <th scope="col">project Location</th>
                <th scope="col">REMOVE</th>
            </tr>
            </thead>

            <tbody>
            @foreach($datas as $data)


                <tr>
                    <td>{{$data->project_id}}</td>
                    <td>{{$data->project_name}}</td>
                    <td>{{$data->project_location}}</td>
                    <td><a class="btn btn-danger" href="{{url('/delete_project/'.$data->project_id)}}">DELETE</a> </td>


                </tr>


            @endforeach
            </tbody>
        </table>


    </div>
@endsection