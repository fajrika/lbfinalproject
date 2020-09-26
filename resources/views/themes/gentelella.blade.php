<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/asset/gentelella/production/images/favicon.ico" type="image/ico" />
    <title>PT. Jaya Sakti Beton</title>
    <link href="/asset/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/asset/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/asset/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="/asset/gentelella/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    @stack('css')
    <link href="/asset/gentelella/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col d-print-none">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title">
                            <i class="fa fa-paw"></i> 
                            <span>
                                PT. Jaya Sakti Beton
                            </span>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="/asset/gentelella/images/icon.svg" alt="..." class="img-circle profile_img">
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
                                @if(session('auth.role') == 0) {{-- Admin --}}
                                <li>
                                    <a href="{{route('userManagement.index')}}">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        User Management
                                    </a>
                                </li>
                                @else {{-- Warehouse --}}
                                <li>
                                    <a href="{{route('customer.index')}}">
                                        <i class="fa fa-user"></i> 
                                        Customer
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('supplier.index')}}">
                                        <i class="fa  fa-user-secret"></i> 
                                        Supplier
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('category.index')}}">
                                        <i class="fa fa-server"></i> 
                                        Category
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('item.index')}}">
                                        <i class="fa fa-archive"></i> 
                                        Item
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa fa-sitemap"></i> 
                                        Flow Item 
                                        <span class="fa fa-chevron-down"></span>
                                    </a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="{{route('incomingItem.index')}}">
                                                Incoming Item (Buy)
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('outcomingItem.index')}}">
                                                Outcoming Item (Sell)
                                            </a>
                                        </li>
                                    </ul>
                                </li> 
                                {{-- <li>
                                    <a href="#">
                                        <i class="fa  fa-newspaper-o"></i> 
                                        Report Item Flow
                                    </a>
                                </li> --}}
                                @endif    
                            </ul>
                        </div>

                    </div>
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="/logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="top_nav d-print-none">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="/asset/gentelella/images/icon.svg" alt="">
                                    {{ session('auth.name') }}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/profile/{{ session('auth.id') }}/edit"> Profile</a>
                                    <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
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
                <div class="row col-md-12">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title d-print-none">
                                <h2> @yield('title','title')<small> @yield('subtitle','subtitle')</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                @stack('content','content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="d-print-none">
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by Colorlib - Modified 1.0
                </div>
                <div class="clearfix"></div>
            </footer>
        </div>
    </div>

    <script src="/asset/gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/asset/gentelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/asset/gentelella/vendors/nprogress/nprogress.js"></script>
    <script src="/asset/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    @stack('js')
    <script src="/asset/gentelella/build/js/custom.min.js"></script>
</body>

</html>