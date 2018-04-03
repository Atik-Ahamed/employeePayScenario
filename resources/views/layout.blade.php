<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="expires" content="0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EmployeePayScenario') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>


</head>
<body id="body">
<div id="app">
    <div class="container">
        <a href="{{ url('/') }}" class="btn btn-dark">Home</a>
        @if(!Auth::guard('employee')->check()&&!Auth::guard('admin')->check())
            <a href="{{url('/employee/login')}}" class="btn btn-warning">employee login</a>
            <a href="{{url('/employee/register')}}" class="btn btn-warning">employee register</a>
            <a href="{{url('/admin/login')}}" class="btn btn-danger">admin login</a>
            <a href="{{url('/admin/register')}}" class="btn btn-danger">admin register</a>
        @endif





            @if(Auth::guard('employee')->check()&&!Auth::guard('admin')->check())
                <?php $empID = Auth::guard('employee')->user()->id; ?>
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::guard('employee')->user()->name}}

                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                        <a class="dropdown-item" href="{{ url('/employee/profile/'.$empID) }}">Profile</a>
                        <a class="dropdown-item" href="{{ url('/employee/edit_profile/'.$empID) }}">Edit Profile</a>
                        <a class="dropdown-item" href="{{ url('/employee/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/employee/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>


                    </div>
                </div>
            @endif

            @if(!Auth::guard('employee')->check()&&Auth::guard('admin')->check())
                <?php $adminID = Auth::guard('admin')->user()->id; ?>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::guard('admin')->user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('/admin/profile/'.$adminID) }}">Profile</a>

                        <a class="dropdown-item" href="{{ url('/admin/edit_profile/'.$adminID) }}">Edit Profile</a>

                        <a class="dropdown-item" href="{{ url('/admin/logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>


                    </div>
                </div>

            @endif


    </div>

    <br><br>
    @yield('content')

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

@yield('addscript')
</body>
</html>
