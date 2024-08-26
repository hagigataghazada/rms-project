<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="{{ asset('home/home.css') }}"> <!-- CSS yolu güncellendi -->
</head>
<body>
<!-- Navbar -->
<nav class="navbar">
    <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"></div>
    <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li class="dropdown">
            <a href="#" class="dropbtn">Contact</a>
            <div class="dropdown-content">
                <a href="#">Phone: +123456789</a>
                <a href="#">Email: info@company.com</a>
            </div>
        </li>
        <li><a href="{{ route('announcements.index') }}">Announcements</a></li>
        <li><a href="#login-section">Login</a></li> <!-- Login butonu eklendi -->
    </ul>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-text">
        <h1>Welcome to Our Residence</h1>
        <p>Your perfect home is just a click away.</p>
    </div>
</section>

<!-- Image Slider -->
<section class="slider">
    <div class="slides">
        <div class="slide"><img src="{{asset('images/sliderpictures/2a4a1308.png')}}" alt="Image 1"></div>
        <div class="slide"><img src="{{ asset('images/sliderpictures/2a4a1331.png') }}" alt="Image 2"></div>
        <div class="slide"><img src="{{ asset('images/sliderpictures/slider3.webp') }}" alt="Image 3"></div>
        <div class="slide"><img src="{{ asset('images/sliderpictures/4569.jpg') }}" alt="Image 4"></div>
        <div class="slide"><img src="{{ asset('images/sliderpictures/slider4.webp') }}" alt="Image 5"></div>
        <div class="slide"><img src="{{ asset('images/sliderpictures/slider5.jpg') }}" alt="Image 6"></div>
        <div class="slide"><img src="{{ asset('images/sliderpictures/slider6.jpg') }}" alt="Image 7"></div>
        <div class="slide"><img src="{{ asset('images/sliderpictures/slider7.jpg') }}" alt="Image 8"></div>
        <div class="slide"><img src="{{ asset('images/sliderpictures/slider8.jpg') }}" alt="Image 9"></div>
        <div class="slide"><img src="{{ asset('images/sliderpictures/slider9.jpg') }}" alt="Image 10"></div>
    </div>
    <!-- Navigation buttons -->
    <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
    <button class="next" onclick="changeSlide(1)">&#10095;</button>
</section>

<!-- Main Section -->
<section class="main-section">
    <!-- Login Section -->
    <div class="card login-section" id="login-section">
        <h2>Login</h2>
        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <button type="submit">Login</button>
        </form>
    </div>

    <!-- Announcements Summary -->
    <div class="card announcements-summary">
        <h2>Latest Announcements</h2>
        <p>Stay updated with the latest news and announcements.</p>
        <!-- Residence Information -->
        <p class="residence-info">
            Our residence offers luxurious living spaces with modern amenities, including a gym, swimming pool, and 24/7 security.
            Discover the perfect balance of comfort and convenience in our community.
        </p>
        <a href="{{ route('announcements.index') }}" class="read-more">Read More</a>
    </div>
</section>

<!-- Footer -->
<footer>
    <p>&copy; 2024 Company Name. All rights reserved.</p>
    <div class="social-links">
        <a href="#">Facebook</a>
        <a href="#">Twitter</a>
        <a href="#">Instagram</a>
    </div>
</footer>

<script src="{{ asset('home/home.js') }}"></script> <!-- JS yolu güncellendi -->
</body>
</html>
