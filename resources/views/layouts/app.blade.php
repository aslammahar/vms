<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vehicle Management System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
    background-color: #f8f9fa;
}
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <h4 class="sidebar-heading">Dashboard</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.index') }}">
                                Admin Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vehicles.list') }}">
                                Manage Vehicles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('drivers.list') }}">
                                Manage Drivers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('maintenance.index') }}">
                                Manage Maintenance
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
