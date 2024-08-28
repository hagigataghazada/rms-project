<div id="sidebar" class="sidebar">
    <ul class="menu-links">
        <li class="menu-item">
            <div class="dropdownDiv">
                <i class="fas fa-building"></i><span class="link-text">Buildings</span>
            </div>
            <ul class="dropdown-menu">
                <li><a href="{{ route('buildings.create') }}" onclick="loadSection('add')">Ekle</a></li>
                <li><a href="{{ route('buildings.index') }}" onclick="loadSection('list')">Liste</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <div class="dropdownDiv">

            <i class="fas fa-home"></i><span class="link-text">Apartments</span>
            </div>
            <ul class="dropdown-menu">
                <li><a href="{{ route('apartments.create') }}" onclick="loadSection('add')">Ekle</a></li>
                <li><a href="{{ route('apartments.list') }}" onclick="loadSection('list')">Liste</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <div class="dropdownDiv">

            <i class="fas fa-concierge-bell"></i><span class="link-text">Services</span>
            </div>
            <ul class="dropdown-menu">
                <li><a href="{{ route('services.create') }}" onclick="loadSection('add')">Ekle</a></li>
                <li><a href="{{ route('services.list') }}" onclick="loadSection('list')">Liste</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <div class="dropdownDiv">

            <i class="fas fa-users"></i><span class="link-text">Residents</span>
            </div>
            <ul class="dropdown-menu">
                <li><a href="{{ route('residents.create') }}" onclick="loadSection('add')">Ekle</a></li>
                <li><a href="{{ route('residents.list') }}" onclick="loadSection('list')">Liste</a></li>
            </ul>
        </li>
{{--        <li class="menu-item">--}}
{{--            <div class="dropdownDiv">--}}

{{--            <i class="fas fa-clipboard-list"></i><span class="link-text">Requests</span>--}}
{{--            </div>--}}
{{--            <ul class="dropdown-menu">--}}
{{--                <li><a href="{{ route('buildings.create') }}" onclick="loadSection('add')">Ekle</a></li>--}}
{{--                <li><a href="{{ route('buildings.list') }}" onclick="loadSection('list')">Liste</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        <li class="menu-item">
            <div class="dropdownDiv">

                <i class="fas fa-dollar-sign"></i><span class="link-text">Payments</span>
            </div>
            <ul class="dropdown-menu">
                <li><a href="{{ route('payments.create') }}" onclick="loadSection('add')">Ekle</a></li>
                <li><a href="{{ route('payments.index') }}" onclick="loadSection('list')">Liste</a></li>
            </ul>
        </li>
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.menu-item');

        menuItems.forEach(item => {
            item.addEventListener('click', function(e) {
                // Önce tüm menu-item'ların 'active' sınıfını kaldır
                menuItems.forEach(i => {
                    if (i !== this) {
                        i.classList.remove('active');
                        i.querySelector('.dropdown-menu').style.display = 'none';
                    }
                });

                // Tıklanan menu-item'a 'active' sınıfını ekle
                this.classList.toggle('active');
                const dropdownMenu = this.querySelector('.dropdown-menu');
                if (this.classList.contains('active')) {
                    dropdownMenu.style.display = 'block';
                } else {
                    dropdownMenu.style.display = 'none';
                }

                // Event'in yayılmasını durdur, aksi takdirde 'document' event'i tetiklenir
                e.stopPropagation();
            });
        });

        // Belirli bir alan dışında tıklamaları algılamak için
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.menu-item')) {
                // Tıklanan alan menu-item değilse tüm 'active' sınıflarını kaldır
                menuItems.forEach(i => {
                    i.classList.remove('active');
                    i.querySelector('.dropdown-menu').style.display = 'none';
                });
            }
        });
    });


    document.getElementById('sidebarToggle').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('collapsed');
    });


</script>


