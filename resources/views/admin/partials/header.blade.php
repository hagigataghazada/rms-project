{{--<!-- Navbar -->--}}
{{--<nav class="navbar">--}}
{{--    <div class="navbar-left">--}}
{{--        <button id="sidebarToggle" class="menu-toggle">--}}
{{--            ☰--}}
{{--        </button>--}}
{{--        <h1>Dashboard</h1>--}}
{{--    </div>--}}
{{--    <div class="navbar-right">--}}
{{--        <div class="profile">--}}
{{--            <span id="profileDropdown" style="cursor: pointer;">{{ auth()->user()->name }}</span>--}}
{{--            <i class="fas fa-user-circle" style="font-size: 50px; color: #333;"></i>--}}
{{--            <div class="dropdown-menu" style="display: none; position: absolute; right: 10px; top: 50px; background-color: white; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); border-radius: 8px; z-index: 1000;">--}}
{{--                <a href="{{ route('admin.edit') }}" class="dropdown-item" style="display: block; padding: 10px; text-decoration: none; color: #333;">Profil Düzenle</a>--}}
{{--                <div class="dropdown-divider" style="border-top: 1px solid #e9ecef;"></div>--}}
{{--                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">--}}
{{--                    @csrf--}}
{{--                    <button type="submit" class="logout-btn" style="background: none; border: none; padding: 10px; width: 100%; text-align: left; cursor: pointer; color: #dc3545;">Çıkış Yap</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

{{--<!-- JavaScript to handle dropdown -->--}}
{{--<script>--}}
{{--    document.getElementById('profileDropdown').addEventListener('click', function() {--}}
{{--        var dropdownMenu = document.querySelector('.profile .dropdown-menu');--}}
{{--        if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') {--}}
{{--            dropdownMenu.style.display = 'block';--}}
{{--        } else {--}}
{{--            dropdownMenu.style.display = 'none';--}}
{{--        }--}}
{{--    });--}}

{{--    // Close the dropdown if clicked outside--}}
{{--    window.addEventListener('click', function(event) {--}}
{{--        var dropdownMenu = document.querySelector('.profile .dropdown-menu');--}}
{{--        var profileDropdown = document.getElementById('profileDropdown');--}}
{{--        if (!profileDropdown.contains(event.target) && !dropdownMenu.contains(event.target)) {--}}
{{--            dropdownMenu.style.display = 'none';--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button id="sidebarToggle" class="btn btn-light me-2">
            ☰
        </button>
        <a class="navbar-brand" href="#">Dashboard</a>

        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.edit') }}">Profil Düzenle</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Çıkış Yap</button>
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user-circle fa-2x"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
