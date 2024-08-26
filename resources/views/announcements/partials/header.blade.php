<!-- resources/views/partials/header.blade.php -->
<header>
    <nav>
        <!-- Navigasyon Menüsü -->
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Contact</a>
                <div class="dropdown-content">
                    <a href="#">Phone: +123456789</a>
                    <a href="#">Email: info@company.com</a>
                </div>
            </li>
        </ul>
    </nav>
</header>
