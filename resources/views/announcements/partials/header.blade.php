<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('announcements/forSale*') ? 'active' : '' }}" href="{{ route('forSale') }}">For Sale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('announcements/forRent*') ? 'active' : '' }}" href="{{ route('forRent') }}">For Rent</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button">
                        Contact
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Phone: +123456789</a></li>
                        <li><a class="dropdown-item" href="#">Email: info@company.com</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
