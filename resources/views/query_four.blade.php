@extends('layout')
@section('content')
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th class="font-italic" scope="col">Employee Name</th>
                <th class="font-italic" scope="col">Project Name</th>

            </tr>
            </thead>

            <tbody>
            @foreach($datas as $data)


                <tr>

                    <td>{{$data->name}}</td>
                    <td>Burton Highway and Googong Subdivision</td>

                </tr>


            @endforeach
            </tbody>
        </table>


    </div>
@endsection