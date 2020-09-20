<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gentelella Alela! | </title>
    <link href="/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    @yield('css')
    <link href="/gentelella/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><span>PT. Jaya Sakti Beton</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/Google_Contacts_icon.svg/1024px-Google_Contacts_icon.svg.png"
                                alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>{{ session('auth.name') }}</span>
                            <h2>{{ session('auth.role') == 0 ? 'Admin' : 'Warehouse' }}</h2>
                        </div>
                    </div>
                    <br />
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                @if(session('auth.role') == 0)
                                <li><a href="{{route('userManagement.index')}}"><i class="fa fa-home"></i> User Management </span></a></li>
                                @else
                                <li><a href="{{route('item.index')}}"><i class="fa fa-home"></i> Item </span></a></li>
                                <li><a href="{{route('itemFlow.index')}}"><i class="fa fa-home"></i> Item Flow </span></a></li>
                                <li><a href="index.html"><i class="fa fa-home"></i> Report Item Flow </span></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/93/Google_Contacts_icon.svg/1024px-Google_Contacts_icon.svg.png"
                                        alt="">{{ session('auth.name') }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="/profile/{{ session('auth.id') }}/edit"> Profile</a></li>
                                    <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h3> @yield('header','header') </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel tile">
                            <div class="x_title">
                                <h2> @yield('title','title')<small> @yield('subtitle','subtitle')</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                @yield('content','content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> - <a
                        href="https://github.com/fajrika">Fajrika</a>
                </div>
                <div class="clearfix"></div>
            </footer>
        </div>
    </div>
    <script src="/gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/gentelella/vendors/nprogress/nprogress.js"></script>
    <script src="/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    @yield('js')
    <script src="/gentelella/build/js/custom.min.js"></script>
    @yield('script')
</body>

</html>
