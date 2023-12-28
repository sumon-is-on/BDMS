<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('web.home') }}">BD<span>MS</span></a>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('web.home') }}" class="nav-link">Home</a></li>
                {{-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li> --}}
                {{-- <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li> --}}
                <li class="nav-item"><a href="{{ route('contact.create') }}" class="nav-link">Contact</a></li>
                @if (auth()->user())
                    <li class="nav-item"><a href="{{ route('user.logout') }}" class="nav-link">LogOut</a></li>
                    <li class="nav-item"><a href="{{ route('web.user.profile', auth()->user()->id) }}" class="nav-link">Profile</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('user.login') }}" class="nav-link">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
