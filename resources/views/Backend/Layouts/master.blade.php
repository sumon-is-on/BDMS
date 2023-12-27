<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BDMS</title>
    <link rel="stylesheet" href="{{ asset('backend/css/admintale.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @notifyCss
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('Backend.Layouts.sidenav')
        <div class="content-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="m-0">Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" mr-4">
                    <a href="#" class="btn btn-outline-success">Profile</a>
                    <a href="{{ route('admin.logout') }}" class="btn btn-outline-danger">LogOut</a>
                </div>
            </div>
            @yield('content')
            @include('notify::components.notify')
            @notifyJs
        </div>
    </div>
</body>
</html>
