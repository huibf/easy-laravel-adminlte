<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('/css/_all-skins.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="#" class="logo">
            <span class="logo-mini"><b>A</b>DM</span>
            <span class="logo-lg"><b>Office</b>ADM</span>
        </a>

        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span></a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i>5 new members joined today</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('/dist/img/avatar/avatar5.png')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">Admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li style="padding:5px;">
                                <a href="#"><i class="fa fa-power-off text-maroon"></i>Sign Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="index.html">
                                <i class="fa fa-circle-o"></i>Dashboard v1</a>
                        </li>
                        <li class="active">
                            <a href="index2.html">
                                <i class="fa fa-circle-o"></i>Dashboard v2</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Layout Options</span>
                        <span class="pull-right-container"><span class="label label-primary pull-right">4</span></span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="pages/layout/top-nav.html">
                                <i class="fa fa-circle-o"></i>Top Navigation</a>
                        </li>
                        <li>
                            <a href="pages/layout/boxed.html">
                                <i class="fa fa-circle-o"></i>Boxed</a>
                        </li>
                        <li>
                            <a href="pages/layout/fixed.html">
                                <i class="fa fa-circle-o"></i>Fixed</a>
                        </li>
                        <li>
                            <a href="pages/layout/collapsed-sidebar.html">
                                <i class="fa fa-circle-o"></i>Collapsed Sidebar</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i>
                        <span>Multilevel</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="#"> <i class="fa fa-circle-o"></i>Level One</a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-circle-o"></i>Level One <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i>Level Two</a>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-circle-o"></i>Level Two<span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="#"><i class="fa fa-circle-o"></i>Level Three</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-circle-o"></i>Level Three</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i>Level One</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </section>
    </aside>

    {{--content--}}
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12"></div>
                <div class="col-md-3 col-sm-6 col-xs-12"></div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-3 col-sm-6 col-xs-12"></div>
                <div class="col-md-3 col-sm-6 col-xs-12"> </div>
            </div>
            <div class="row">
                <div class="col-md-12"></div>
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b>1.0
        </div>
        <strong>Copyright &copy; 2014-2016
            <a href="#">xxx</a>.</strong>All rights reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
</div>

<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('/js/adminlte.min.js')}}"></script>
<script src="{{asset('/js/jquery.cookie.js')}}"></script>
<script src="{{asset('/js/api.js')}}"></script>
<script src="{{asset('/js/app.js')}}"></script>
</body>

</html>