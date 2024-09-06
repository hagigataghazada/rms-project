<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button id="sidebarToggle" class="btn btn-light me-2">
            ☰
        </button>
        <a class="navbar-brand" href="">Dashboard</a>

        <div class="collapse d-block navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(auth()->check())
                            {{ auth()->user()->name }}
                        @else
                            Guest
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.edit') }}">Edit Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="fas fa-user-circle fa-2x"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
