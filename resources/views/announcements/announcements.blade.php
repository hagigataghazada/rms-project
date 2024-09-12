<!DOCTYPE html>
<html lang="en">
<head>
    @include('announcements.partials.head')
</head>
<body>
@include('announcements.partials.header')

<main class="container">
    @yield('content')
</main>

@include('announcements.partials.footer')

<!-- Popper.js ve Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('announcements/announcements.js') }}"></script>
</body>
</html>
