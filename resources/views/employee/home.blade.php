@extends('layout')

@section('content')
    <div class="container">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th class="font-italic" scope="col">Employee Details</th>

            </tr>
            </thead>

            <tr>
                <td>Employee Name: {{$data->name}}</td>
            </tr>
            <tr>
                <td>Employee Department ID: {{$data->dept_id}}</td>
            </tr>
            <tr>
                <td>Employee Work Type: {{$data->type_of_work}}</td>
            </tr>
            <tr>
                <td>Employee Hourly Rate: {{$data->hourlyrate}}</td>
            </tr>
            <tr>
                <td>Employee email: {{$data->email}}</td>
            </tr>
            @if($address!=null)
                <tr>
                    <td>street_no: {{$address->street_no}}</td>
                </tr>

                <tr>
                    <td>street_name: {{$address->street_name}}</td>
                </tr>
                <tr>
                    <td>city: {{$address->city}}</td>
                </tr>
                <tr>
                    <td>zip_code: {{$address->zip_code}}</td>
                </tr>

            @endif
            <tbody>

            </tbody>
        </table>


    </div>
@endsection
