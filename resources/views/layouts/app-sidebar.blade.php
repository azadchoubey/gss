<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'inspection') }}</title>

    <!-- Scripts -->
    <script type="application/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <script type="application/javascript" src="{{ asset('js/functions.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gss-styles.css') }}" rel="stylesheet">
    <style>
        :root {
            --gss-primary: #FC0015;
            --gss-primary-hover: #dc0012;
            --gss-secondary: #2e86de;
            --gss-light: #f5f9ff;
            --gss-dark: #333333;
            --gss-muted: #6c757d;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }
        
        .sidebar {
            min-height: calc(100vh - 56px);
            background-color: #fff;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .sidebar-link {
            display: block;
            padding: 0.75rem 1rem;
            color: var(--gss-dark);
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: all 0.2s ease;
        }
        
        .sidebar-link:hover {
            background-color: #f9f9f9;
            color: var(--gss-primary);
            border-left-color: var(--gss-primary);
        }
        
        .sidebar-link.active {
            background-color: var(--gss-light);
            color: var(--gss-primary);
            border-left-color: var(--gss-primary);
            font-weight: 600;
        }
        
        .sidebar-heading {
            padding: 0.75rem 1rem;
            font-weight: bold;
            color: var(--gss-muted);
            text-transform: uppercase;
            font-size: 0.8rem;
        }
        .case-card {
            transition: transform 0.2s, box-shadow 0.2s;
            border-radius: 8px;
            overflow: hidden;
        }
        .case-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .case-header {
            padding: 15px;
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }
        .case-body {
            padding: 15px;
        }
        .case-footer {
            background-color: #f8f9fa;
            padding: 10px 15px;
            border-top: 1px solid #eee;
        }
        .action-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
        }
        .action-btn i {
            font-size: 1.25rem;
        }
        .vehicle-info {
            color: #333;
            font-size: 1.1rem;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md nav-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/gss.png') }}" alt="GSS Logo" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                    <div class="position-sticky pt-3">
                        <div class="sidebar-heading">
                            Case Management
                        </div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('caselist') }}" class="sidebar-link {{ request()->routeIs('caselist') ? 'active' : '' }}">
                                    <i class="fas fa-list-ul me-2"></i> Case List
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('addcase') }}" class="sidebar-link {{ request()->routeIs('addcase') ? 'active' : '' }}">
                                    <i class="fas fa-plus-circle me-2"></i> Add Case
                                </a>
                            </li>
                        </ul>

                        <div class="sidebar-heading mt-3">
                            Companies & Branches
                        </div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('addcompany') }}" class="sidebar-link {{ request()->routeIs('addcompany') ? 'active' : '' }}">
                                    <i class="fas fa-building me-2"></i> Add Company
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('editcompany') }}" class="sidebar-link {{ request()->routeIs('editcompany') ? 'active' : '' }}">
                                    <i class="fas fa-edit me-2"></i> Edit Company
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('addbranch') }}" class="sidebar-link {{ request()->routeIs('addbranch') ? 'active' : '' }}">
                                    <i class="fas fa-code-branch me-2"></i> Add Branch
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('editbranch') }}" class="sidebar-link {{ request()->routeIs('editbranch') ? 'active' : '' }}">
                                    <i class="fas fa-edit me-2"></i> Edit Branch
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('addmanufacturer') }}" class="sidebar-link {{ request()->routeIs('addmanufacturer') ? 'active' : '' }}">
                                    <i class="fas fa-industry me-2"></i> Add Manufacturer
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('editmanufacturer') }}" class="sidebar-link {{ request()->routeIs('editmanufacturer') ? 'active' : '' }}">
                                    <i class="fas fa-edit me-2"></i> Edit Manufacturer
                                </a>
                            </li>
                        </ul>

                        @if(Auth::user()->role_id==1 || Auth::user()->role_id==2)
                        <div class="sidebar-heading mt-3">
                            User Management
                        </div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('adduser') }}" class="sidebar-link {{ request()->routeIs('adduser') ? 'active' : '' }}">
                                    <i class="fas fa-user-plus me-2"></i> Add User
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('edituser') }}" class="sidebar-link {{ request()->routeIs('edituser') ? 'active' : '' }}">
                                    <i class="fas fa-user-edit me-2"></i> Edit User
                                </a>
                            </li>
                        </ul>
                        @endif

                        <div class="sidebar-heading mt-3">
                            Billing
                        </div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('misdownload') }}" class="sidebar-link {{ request()->routeIs('misdownload') ? 'active' : '' }}">
                                    <i class="fas fa-file-excel me-2"></i> Download MIS Excel
                                </a>
                            </li>
                        </ul>

                        <div class="sidebar-heading mt-3">
                            FO Management
                        </div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('addfo') }}" class="sidebar-link {{ request()->routeIs('addfo') ? 'active' : '' }}">
                                    <i class="fas fa-user-plus me-2"></i> Add FO
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('editfo') }}" class="sidebar-link {{ request()->routeIs('editfo') ? 'active' : '' }}">
                                    <i class="fas fa-user-edit me-2"></i> Edit FO
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
   
    <script type="application/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script>
    <script type="application/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    
    @yield('scripts')
</body>
</html>
