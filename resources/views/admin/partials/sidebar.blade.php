<div id="sidebar" class="sidebar">
    <ul class="menu-links list-unstyled">
        <!-- Buildings -->
        <li class="menu-item">
            <div class="dropdownDiv d-flex align-items-center">
                <i class="fas fa-building me-2"></i><span class="link-text">Buildings</span>
            </div>
            <ul class="dropdown-menu list-unstyled collapse">
                <li><a href="{{ route('buildings.create') }}" class="d-block px-3 py-2">Ekle</a></li>
                <li><a href="{{ route('buildings.index') }}" class="d-block px-3 py-2">Liste</a></li>
            </ul>
        </li>

        <!-- Apartments -->
        <li class="menu-item">
            <div class="dropdownDiv d-flex align-items-center">
                <i class="fas fa-home me-2"></i><span class="link-text">Apartments</span>
            </div>
            <ul class="dropdown-menu list-unstyled collapse">
                <li><a href="{{ route('apartments.create') }}" class="d-block px-3 py-2">Ekle</a></li>
                <li><a href="{{ route('apartments.list') }}" class="d-block px-3 py-2">Liste</a></li>
            </ul>
        </li>

        <!-- Services -->
        <li class="menu-item">
            <div class="dropdownDiv d-flex align-items-center">
                <i class="fas fa-concierge-bell me-2"></i><span class="link-text">Services</span>
            </div>
            <ul class="dropdown-menu list-unstyled collapse">
                <li><a href="{{ route('services.create') }}" class="d-block px-3 py-2">Ekle</a></li>
                <li><a href="{{ route('services.list') }}" class="d-block px-3 py-2">Liste</a></li>
            </ul>
        </li>

        <!-- Residents -->
        <li class="menu-item">
            <div class="dropdownDiv d-flex align-items-center">
                <i class="fas fa-users me-2"></i><span class="link-text">Residents</span>
            </div>
            <ul class="dropdown-menu list-unstyled collapse">
                <li><a href="{{ route('residents.create') }}" class="d-block px-3 py-2">Ekle</a></li>
                <li><a href="{{ route('residents.list') }}" class="d-block px-3 py-2">Liste</a></li>
            </ul>
        </li>

{{--        Notifications--}}

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.notifications.create') }}">
                <i class="fas fa-bell"></i> Bildirim Gönder
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.notifications.index') }}">
                <i class="fas fa-list"></i> Bildirimler
            </a>
        </li>

        <!-- Payments -->
        <li class="menu-item">
            <div class="dropdownDiv d-flex align-items-center">
                <i class="fas fa-dollar-sign me-2"></i><span class="link-text">Payments</span>
            </div>
            <ul class="dropdown-menu list-unstyled collapse">
                <li><a href="{{ route('payments.create') }}" class="d-block px-3 py-2">Ekle</a></li>
                <li><a href="{{ route('payments.index') }}" class="d-block px-3 py-2">Liste</a></li>
            </ul>
        </li>
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.menu-item');

        menuItems.forEach(item => {
            item.addEventListener('click', function(e) {
                menuItems.forEach(i => {
                    if (i !== this) {
                        i.classList.remove('active');
                        i.querySelector('.dropdown-menu').classList.remove('show');
                    }
                });

                this.classList.toggle('active');
                const dropdownMenu = this.querySelector('.dropdown-menu');
                dropdownMenu.classList.toggle('show');

                e.stopPropagation();
            });
        });

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.menu-item')) {
                menuItems.forEach(i => {
                    i.classList.remove('active');
                    i.querySelector('.dropdown-menu').classList.remove('show');
                });
            }
        });
    });

    document.getElementById('sidebarToggle').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('collapsed');
    });
</script>
