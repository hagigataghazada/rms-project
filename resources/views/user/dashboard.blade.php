<!-- resources/views/user/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.partials.head')
</head>
<body>
@include('user.partials.header')

<div class="d-flex">
    @include('user.partials.sidebar')

    <div class="content p-4" style="margin-left: 260px;">
        @yield('content')
    </div>
</div>

@include('user.partials.footer')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/dashboard.js') }}"></script>
</body>
</html>
