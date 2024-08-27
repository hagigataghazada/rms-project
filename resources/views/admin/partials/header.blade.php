<!-- Navbar -->
<nav class="navbar">
    <div class="navbar-left">
        <button id="sidebarToggle" class="menu-toggle">
            ☰
        </button>
        <h1>Dashboard</h1>
    </div>
    <div class="navbar-right">
        <div class="profile">
            <span>Admin Name</span>
            <img src="https://via.placeholder.com/50" alt="Profile Image">
            <div class="dropdown-menu">
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Çıkış Yap</button>
                </form>
            </div>
        </div>
    </div>
</nav>
