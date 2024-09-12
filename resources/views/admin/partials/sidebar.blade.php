<!-- Sidebar -->
<div id="sidebar" class="sidebar collapsed" style="padding: 20px;">
    <ul class="menu-links list-unstyled">
        <!-- Buildings -->
        <li class="menu-item">
            <div class="dropdownDiv d-flex align-items-center">
                <i class="fas fa-building me-2"></i><span class="link-text">Buildings</span>
            </div>
            <ul class="dropdown-menu list-unstyled collapse">
                <li><a href="{{ route('buildings.create') }}" class="d-block ">Add</a></li>
                <li><a href="{{ route('buildings.index') }}" class="d-block">List</a></li>
            </ul>
        </li>

        <!-- Apartments -->
        <li class="menu-item">
            <div class="dropdownDiv d-flex align-items-center">
                <i class="fas fa-home me-2"></i><span class="link-text">Apartments</span>
            </div>
            <ul class="dropdown-menu list-unstyled collapse">
                <li><a href="{{ route('apartments.create') }}" class="d-block ">Add</a></li>
                <li><a href="{{ route('apartments.list') }}" class="d-block ">List</a></li>
            </ul>
        </li>

        <!-- Services -->
        <li class="menu-item">
            <div class="dropdownDiv d-flex align-items-center">
                <i class="fas fa-concierge-bell me-2"></i><span class="link-text">Services</span>
            </div>
            <ul class="dropdown-menu list-unstyled collapse">
                <li><a href="{{ route('services.create') }}" class="d-block ">Add</a></li>
                <li><a href="{{ route('services.list') }}" class="d-block ">List</a></li>
            </ul>
        </li>

        <!-- Residents -->
        <li class="menu-item">
            <div class="dropdownDiv d-flex align-items-center" style="gap: 8px;">
                <i class="fas fa-users me-2"></i><span class="link-text">Residents</span>
            </div>
            <ul class="dropdown-menu list-unstyled collapse">
                <li><a href="{{ route('residents.create') }}" class="d-block ">Add</a></li>
                <li><a href="{{ route('residents.list') }}" class="d-block ">List</a></li>
            </ul>
        </li>

        <!-- Notifications -->
        <li class="menu-item">
            <div class="dropdownDiv d-flex align-items-center">
                <i class="fas fa-bell"></i><span class="link-text">Notifications</span>
            </div>
            <ul class="dropdown-menu list-unstyled collapse">
                <li><a href="{{ route('admin.notifications.create') }}" class="d-block ">Send</a></li>
                <li><a href="{{ route('admin.notifications.index') }}" class="d-block ">List</a></li>
            </ul>
        </li>

        <!-- Payments -->
        <li class="menu-item">
            <div class="dropdownDiv d-flex align-items-center">
                <i class="fas fa-dollar-sign me-2"></i><span class="link-text">Payments</span>
            </div>
            <ul class="dropdown-menu list-unstyled collapse">
                <li><a href="{{ route('payments.create') }}" class="d-block ">Add</a></li>
                <li><a href="{{ route('payments.list') }}" class="d-block ">List</a></li>
            </ul>
        </li>
    </ul>
</div>

<script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('collapsed');
    });
</script>
