@extends('layout')
@section('content')
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Employee Name</th>
                <th scope="col">Per Week</th>

            </tr>
            </thead>

            <tbody>
            @foreach($datas as $data)


                <tr>

                    <td>{{$data->name}}</td>
                    <td>{{$data->PerWeek." hours"}}</td>

                </tr>


            @endforeach
            </tbody>
        </table>


    </div>
@endsection