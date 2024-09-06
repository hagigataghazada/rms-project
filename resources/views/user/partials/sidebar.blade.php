<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('user.notifications') }}" class="nav-link">
                <i class="fas fa-bell me-2"></i> Notifications
            </a>
        </li>
        <li>
            <a href="{{ route('user.services') }}" class="nav-link">
                <i class="fas fa-concierge-bell me-2"></i> Services
            </a>
        </li>
        <li>
            <a href="{{ route('user.payments') }}" class="nav-link">
                <i class="fas fa-dollar-sign me-2"></i> Payments
            </a>
        </li>
        <li>
            <a href="{{ route('user.profile.edit') }}" class="nav-link">
                <i class="fas fa-user-edit me-2"></i> Profil Düzenle
            </a>
        </li>
        <li>
            <form action="{{ route('user.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="nav-link btn btn-link text-start">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>
