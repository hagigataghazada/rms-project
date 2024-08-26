<!-- resources/views/announcements.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="{{ asset('announcements/announcements.css') }}">
</head>
<body>

@include('announcements.partials.header')

<main>
    <div class="content-header">
        <h1>Announcements</h1>
        <div class="filterapt">
            <button class="filter-toggle">Filter Apartments</button>
            <div id="filters">
                @include('announcements.partials.filters')
            </div>
        </div>
    </div>

    @include('announcements.partials.for-sale')

    @include('announcements.partials.for-rent')
</main>

@include('announcements.partials.footer')

<script>
    // Show More/Show Less functionality for Sale listings
    document.getElementById('showMoreForSale').addEventListener('click', function() {
        // Implement your logic to show more apartments
        document.getElementById('showLessForSale').style.display = 'block';
    });

    document.getElementById('showLessForSale').addEventListener('click', function() {
        // Implement your logic to show fewer apartments
        document.getElementById('showMoreForSale').style.display = 'block';
        this.style.display = 'none';
    });

    // Show More/Show Less functionality for Rent listings
    document.getElementById('showMoreForRent').addEventListener('click', function() {
        // Implement your logic to show more apartments
        document.getElementById('showLessForRent').style.display = 'block';
    });

    document.getElementById('showLessForRent').addEventListener('click', function() {
        // Implement your logic to show fewer apartments
        document.getElementById('showMoreForRent').style.display = 'block';
        this.style.display = 'none';
    });
    document.querySelector('.filter-toggle').addEventListener('click', function() {
        document.getElementById('filters').classList.toggle('open');
    });
</script>
<script src="{{ asset('announcements/announcements.js') }}"></script>
</body>
</html>
