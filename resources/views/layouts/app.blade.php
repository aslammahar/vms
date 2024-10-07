<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/car.jpg')}}">
    <title>VMS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            height: 100%;
            padding: 48px 0 0;
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .nav-link {
            color: #333;
        }
        .nav-link:hover {
            background-color: #007bff;
            color: white;
        }
        .sidebar-heading {
            font-size: 1.25rem;
            color: #007bff;
            margin-bottom: 1rem;
        }
        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 1rem;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
        }
        .btn-logout {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-logout:hover {
            text-decoration: underline;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 15px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #eaeaea;
        }
        .user-icon {
            position: relative;
            cursor: pointer;
        }
        .dropdown {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            border: 1px solid #eaeaea;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 150px;
            border-radius: 4px
        }
        .user-icon:hover .dropdown {
            display: block;
        }
        .dropdown a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
        }
        .dropdown a:hover {
            background-color: #007bff;
            color: white;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px 0;
            z-index: 1000;
            height: 50px;
            border-top: 1px solid #17a2b8;
        }



    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @if (!request()->is('login'))
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h4 class="sidebar-heading">Dashboard</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.index') }}">
                                <i class="fas fa-tachometer-alt fa-fw"></i> Admin Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vehicles.list') }}">
                                <i class="fas fa-car fa-fw"></i> Manage Vehicles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('drivers.list') }}">
                                <i class="fas fa-user-tie fa-fw"></i> Manage Drivers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('maintain.list') }}">
                                <i class="fas fa-tools fa-fw"></i> Manage Maintenance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('salaries.list') }}">
                                <i class="fas fa-dollar-sign fa-fw"></i> Salaries
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('incident.list') }}">
                                <i class="fas fa-exclamation-triangle"></i> Incident Reports
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        @endif


            <main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4">
                <div class="navbar">
                    <h1>{{-- Vehicle Management System --}}</h1>
                    @if (!request()->is('login')) <!-- Check if the current route is NOT the login route -->
                    <div class="user-icon">
                        <i class="fas fa-user-circle fa-2x" style="color: #17a2b8;"></i>
                        <div class="dropdown">
                            <a href="{{ route('profile.show') }}">My Profile</a>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endif
                </div>

                @yield('content')
            </main>

            @if (!request()->is('login')) <!-- Check if the current route is NOT the login route -->
            <footer class="bg-white text-dark text-center">
                <p>&copy; {{ date('Y') }} VMS . All Rights Reserved.</p>
            </footer>
            @endif



        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
