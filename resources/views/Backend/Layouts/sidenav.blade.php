<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <h1 class="text-white">BDMS</h1>
            <div class="info">
                <a href="#" class="d-block"></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('backend.dashboard') }}" class="nav-link active"><p>Dashboard</p></a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('user.index') }}" class="nav-link"><p>Users</p></a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('patient.index') }}" class="nav-link"><p>Patients</p></a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('donor.index') }}" class="nav-link"><p>Donors</p></a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('backend.request.list') }}" class="nav-link"><p>Blood Req: List</p></a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('service.index') }}" class="nav-link"><p>Services</p></a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('contact.index') }}" class="nav-link"><p>Contact Us</p></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
