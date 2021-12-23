<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/admin-panel/vendors/typicons.font/font/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin-panel/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin-panel/css/vertical-layout-light/style.css')}}">
</head>
<body>
<div id="app">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{route('index')}}"><img
                        src="https://mohasoyw.files.wordpress.com/2021/01/jago.png" alt="logo" style="width:150px"/></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('index')}}"><img
                        src="https://mohasoyw.files.wordpress.com/2021/01/jago.png" alt="logo" style="width:150px"/></a>
                <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button"
                        data-toggle="minimize">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item  d-none d-lg-flex">
                        <a class="nav-link active" href="{{route('admin.dashboard')}}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item  d-none d-lg-flex">
                        <a class="nav-link" href="{{route('index')}}">
                            Home
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown"
                           id="profileDropdown">
                            <i class="typcn typcn-user-outline mr-0"></i>
                            <span class="nav-profile-name">{{Auth::guard('admin')->user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                             aria-labelledby="profileDropdown">
                            <a href="{{route('admin.settings.edit')}}" class="dropdown-item">
                                <i class="typcn typcn-cog text-primary"></i>
                                Settings
                            </a>
                            <a href="{{route('admin.logout')}}" class="dropdown-item">
                                <i class="typcn typcn-power text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <div class="d-flex sidebar-profile">
                            <div class="sidebar-profile-image">
                                <img src="https://cdn3.iconfinder.com/data/icons/avatars-round-flat/33/man5-512.png"
                                     alt="image">
                                <span class="sidebar-status-indicator"></span>
                            </div>
                            <div class="sidebar-profile-name">
                                <p class="sidebar-name">
                                    {{Auth::guard('admin')->user()->name}}
                                </p>
                                <p class="sidebar-designation">
                                    Welcome
                                </p>
                            </div>
                        </div>
                        <div class="nav-search">
                            <form action="{{route('admin.search')}}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                           placeholder="Type to search..."
                                           aria-label="search" aria-describedby="search">

                                    <div class="input-group-append">
                                      <span class="input-group-text" id="search">
                                        <i class="typcn typcn-zoom"></i>
                                      </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <p class="sidebar-menu-title">Dashboard</p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            <i class="typcn typcn-briefcase menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.category')}}">
                            <i class="typcn typcn-briefcase menu-icon"></i>
                            <span class="menu-title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.post')}}">
                            <i class="typcn typcn-briefcase menu-icon"></i>
                            <span class="menu-title">Post</span>
                        </a>
                    </li>
                </ul>
            </nav>
            @yield('content')
        </div>
    </div>
</div>


<script src="{{asset('assets/admin-panel/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/template.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/settings.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/todolist.js')}}"></script>
<script src="{{asset('assets/admin-panel/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{asset('assets/admin-panel/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('assets/admin-panel/js/dashboard.js')}}"></script>
</body>
</html>
