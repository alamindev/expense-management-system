<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Admin Panel</title>
        <link rel="icon" type="image/png" href="{{asset('/contents')}}/img/admin-favicon.png">
        <link href="{{asset('/contents')}}/css/bootstrap.min.css" rel="stylesheet" />
        <link href="{{asset('/contents')}}/css/animate.min.css" rel="stylesheet"/>
        <link href="{{asset('/contents')}}/css/dashboard.css" rel="stylesheet"/>
        <link href="{{asset('/contents')}}/css/demo.css" rel="stylesheet" />
        <link href="{{asset('/contents')}}/css/font-awesome.min.css" rel="stylesheet">
        <link href='{{asset('/contents')}}/css/google.fonts.css' rel='stylesheet' type='text/css'>
        <link href="{{asset('/contents')}}/css/themify-icons.css" rel="stylesheet">
        <link href="{{asset('/contents')}}/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="{{asset('/contents')}}/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="{{asset('/contents')}}/css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar" data-background-color="white" data-active-color="danger">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="#" class="simple-text">
                            Khorcha
                        </a>
                    </div>
                    <ul class="nav">
                        <li class="active">
                            <a href="{{url('/admin')}}">
                                <i class="fa fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/admin/user')}}">
                                <i class="fa fa-user-circle-o"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/admin/summary')}}">
                                <i class="fa fa-gg-circle"></i>
                                <p>Summary</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/admin/manage')}}">
                                <i class="fa fa-gears"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/admin/income')}}">
                                <i class="ti-wallet"></i>
                                <p>Income</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/admin/expense')}}">
                                <i class="fa fa-cubes"></i>
                                <p>Expense</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/admin/loan')}}">
                                <i class="fa fa-address-book-o"></i>
                                <p>Loan Information</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="fa fa-cloud"></i>
                                <p>Report</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/admin/recycle')}}">
                                <i class="fa fa-recycle"></i>
                                <p>Recycle Bin</p>
                            </a>
                        </li>
                        <li class="active-pro">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar bar1"></span>
                                <span class="icon-bar bar2"></span>
                                <span class="icon-bar bar3"></span>
                            </button>
                            <a class="navbar-brand" href="#">Dashboard</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <p>{{ Auth::user()->name }}</p>
                                        <b class="fa fa-user-circle-o"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li>Pagename</li>
                </ul>

                @yield('content')

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="copyright pull-right">
                            Copyright &copy; 2018. Development by <a href="#">Creative IT Ltd.</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
    <script src="{{asset('/contents')}}/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="{{asset('/contents')}}/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{asset('/contents')}}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('/contents')}}/js/dashboard.js"></script>
    <script src="{{asset('/contents')}}/js/demo.js"></script>
    <script src="{{asset('/contents')}}/js/dataTables.min.js"></script>
    <script src="{{asset('/contents')}}/js/custom.js"></script>
    <script>
  $(document).ready(function(){
    $( "#search" ).click(function() {
      var from = $('#datepickerForm').val();
      var to = $('#datepickerTo').val();
      var base_url = window.location.origin;
      var url = base_url+'/admin/summary/search/'+from+'/'+to;
      location.href = url;
    });
  });
</script>
</html>
