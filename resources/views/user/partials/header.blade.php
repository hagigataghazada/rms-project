<!-- resources/views/user/partials/header.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">User Dashboard</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            @if(auth()->check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.profile') }}">{{ auth()->user()->name }}</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('user.logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link" style="display: inline; cursor: pointer;">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Login</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
