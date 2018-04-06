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
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link href="{{ asset('css/additional.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>


</head>
<body id="body">
<div id="app">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" class="btn btn-dark">Huon</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    @if(!Auth::guard('employee')->check()&&!Auth::guard('admin')->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/employee/login')}}">employee login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/employee/register')}}">employee register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/admin/login')}}">admin login</a>
                        </li>
                    @endif

                    @if(Auth::guard('employee')->check()&&!Auth::guard('admin')->check())
                        <li class="nav-item">
                            <?php $empID = Auth::guard('employee')->user()->id; ?>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="https://example.com"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{Auth::guard('employee')->user()->name}}

                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                    <a class="dropdown-item" href="{{ url('/employee/profile/'.$empID) }}">Profile</a>
                                    <a class="dropdown-item" href="{{ url('/employee/edit_profile/'.$empID) }}">Edit
                                        Profile</a>
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
                        </li>
                    @endif

                    @if(!Auth::guard('employee')->check()&&Auth::guard('admin')->check())
                        <li class="nav-item">
                            <?php $adminID = Auth::guard('admin')->user()->id; ?>
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="https://example.com"
                                   id="dropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{Auth::guard('admin')->user()->name}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ url('/admin/home') }}">Profile</a>



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
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>


    @yield('content')
        <br>
        <br>
        <br>
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Created by 1503087,1503088,1503089,1503090,1503091,1503092</p>
                <p class="m-0 text-center text-white">Copyright &copy; Huon Contractors Pty Ltd 2018</p>

            </div>
            <!-- /.container -->
        </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

@yield('addscript')
</body>
</html>
