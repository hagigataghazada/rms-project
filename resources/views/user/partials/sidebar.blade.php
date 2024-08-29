<!-- resources/views/user/partials/sidebar.blade.php -->
<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.profile') }}">
                <i class="fas fa-user"></i> Profile
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.notifications') }}">
                <i class="fas fa-bell"></i> Notifications
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.services') }}">
                <i class="fas fa-concierge-bell"></i> Services
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.settings') }}">
                <i class="fas fa-cogs"></i> Settings
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.help') }}">
                <i class="fas fa-question-circle"></i> Help
            </a>
        </li>
        <li class="nav-item">
            <form action="{{ route('user.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="nav-link btn btn-link">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>
