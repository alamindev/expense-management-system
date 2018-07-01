<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Khorcha</title>
        <link rel="stylesheet" href="{{ asset('contents') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/dataTables.bootstrap.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/daterangepicker-bs3.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/datepicker3.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/all.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/select2.min.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/adminLTE.min.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/all-skins.min.css">
        <link rel="stylesheet" href="{{ asset('contents') }}/css/style.css">
        {!! Charts::assets() !!}
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="{{'/admin'}}" class="logo">
                    <span class="logo-mini">K<b>M</b>S</span>
                    <span class="logo-lg"><b>K</b>horcha</span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">1</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 1 messages</li>
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="{{ asset('contents') }}/images/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">2</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 2 notifications</li>
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>                                            
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger">1</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 1 tasks</li>
                                    <li>
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <h3>
                                                        Design some buttons
                                                        <small class="pull-right">20%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ asset('contents') }}/images/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Uzzal</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="{{ asset('contents') }}/images/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                            Alexander Pierce - Web Developer
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('contents') }}/images/user2-160x160.jpg" class="img-circle" alt="user">
                        </div>
                        <div class="pull-left info">
                            <p>{{Auth::user()->name}}</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active"><a href="{{'/admin'}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <li><a href="{{'/admin/user'}}"><i class="fa fa-user"></i> <span>Users</span></a></li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-gears"></i> <span>Manage</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-cog"></i>Basic</a></li>
                                <li><a href="{{'/admin/income/category'}}"><i class="fa fa-cog"></i>Income Category</a></li>
                                <li><a href="{{'/admin/expense/category'}}"><i class="fa fa-cog"></i>Expense Category</a></li>
                                <li><a href="{{'/admin/loaner'}}"><i class="fa fa-cog"></i>Loaner Information</a></li>
                            </ul>
                        </li>
                        <li><a href="{{'/admin/income'}}"><i class="fa fa-gg-circle"></i> <span>Income</span></a></li>
                        <li><a href="{{'/admin/expense'}}"><i class="fa fa-cubes"></i> <span>Expense</span></a></li>
                        <li><a href="{{'/admin/summary'}}"><i class="fa fa-bars"></i> <span>Summary</span></a></li>
                        <li><a href="{{'/admin/loan'}}"><i class="fa fa-address-book-o"></i> <span>Loan</span></a></li>
                        <li><a href="{{'/admin/report'}}"><i class="fa fa-bar-chart"></i> <span>Report</span></a></li>
                        <li><a href="#"><i class="fa fa-recycle"></i> <span>Recycle</span></a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                 <i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        Dashboard                       
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <section class="content">
                    @yield('infobar')
                    @yield('add-user')
                    @yield('all-user')
                    @yield('view-user')
                    @yield('all-income-category')
                    @yield('add-income-category')
                    @yield('edit-income-category')
                    @yield('view-income-category')
                    @yield('add-income')
                    @yield('all-income')
                    @yield('edit-income')
                    @yield('view-income')
                    @yield('all-expense-category')
                    @yield('add-expense-category')
                    @yield('edit-expense-category')
                    @yield('view-expense-category')
                    @yield('add-expense')
                    @yield('all-expense')
                    @yield('edit-expense')
                    @yield('view-expense')
                    @yield('income-summary')
                    @yield('search-summary')
                    @yield('barchart-report')
                    @yield('all-loaner')
                    @yield('add-loaner')
                    @yield('all-loan')
                    @yield('all-payment')
                    @yield('add-payment')
                    @yield('view-payment')
                    @yield('add-recipt')
                    @yield('recycle-loan')
                </section>
            </div>
            <footer class="main-footer">
                Copyright &copy;2017 All Rights Reserved.Development By <strong><a href="#">Uzzal</a></strong>.                 
            </footer>
        </div>
        <script src="{{ asset('contents') }}/js/jQuery-2.2.0.min.js"></script>
        <script src="{{ asset('contents') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('contents') }}/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('contents') }}/js/dataTables.bootstrap.min.js"></script>
        <script src="{{ asset('contents') }}/js/select2.full.min.js"></script>
        <script src="{{ asset('contents') }}/js/jquery.inputmask.js"></script>
        <script src="{{ asset('contents') }}/js/jquery.inputmask.date.extensions.js"></script>
        <script src="{{ asset('contents') }}/js/jquery.inputmask.extensions.js"></script>
        <script src="{{ asset('contents') }}/js/moment.js"></script>
        <script src="{{ asset('contents') }}/js/daterangepicker.js"></script>
        <script src="{{ asset('contents') }}/js/bootstrap-datepicker.js"></script>
        <script src="{{ asset('contents') }}/js/bootstrap-colorpicker.min.js"></script>
        <script src="{{ asset('contents') }}/js/bootstrap-timepicker.min.js"></script>
        <script src="{{ asset('contents') }}/js/icheck.min.js"></script>
        <script src="{{ asset('contents') }}/js/fastclick.js"></script>
        <script src="{{ asset('contents') }}/js/app.min.js"></script>
        <script src="{{ asset('contents') }}/js/jquery.sparkline.min.js"></script>
        <script src="{{ asset('contents') }}/js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="{{ asset('contents') }}/js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="{{ asset('contents') }}/js/jquery.slimscroll.min.js"></script>
        <script src="{{ asset('contents') }}/js/demo.js"></script>
        <script src="{{ asset('contents') }}/js/custom.js"></script>
    </body>
</html>
