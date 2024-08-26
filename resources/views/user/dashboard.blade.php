<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Dashboard</title>
    <link rel="stylesheet" href="resident-dashboard.css">
</head>
<body>
<!-- Collapsible Menu Button -->
<button id="menu-toggle" class="menu-toggle">☰ Menu</button>

<!-- Collapsible Menu -->
<div id="collapsible-menu" class="collapsible-menu open">
    <ul class="menu-links">
        <li><a href="#" data-section="payments">Payments</a></li>
        <li><a href="#" data-section="requests">Requests</a></li>
        <li><a href="#" data-section="profile">Profile</a></li>
        <li><a href="#" data-section="notifications">Notifications</a></li>
        <li><a href="#" data-section="logout">Logout</a></li>
    </ul>
</div>

<!-- Content -->
<div class="content">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-links">
            <a href="home.html">Home</a>
            <a href="resident-dashboard.html">Dashboard</a>
        </div>
    </nav>

    <!-- Dashboard Sections -->
    <section class="dashboard-sections">
        <h2>Resident Sections</h2>
        <div class="section-links">
            <a href="#" data-section="payments">Payments</a>
            <a href="#" data-section="requests">Requests</a>
            <a href="#" data-section="profile">Profile</a>
            <a href="#" data-section="notifications">Notifications</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Resident Dashboard. All rights reserved.</p>
    </footer>
</div>

<script src="resident-dashboard.js"></script>
</body>
</html>
