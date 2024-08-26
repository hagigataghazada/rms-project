<!-- resources/views/partials/for-rent.blade.php -->
<section id="for-rent">
    <h2>For Rent</h2>
    <div class="listing-container">
        <!-- Her bir kiralık apartman için -->
{{--        @foreach($forRentApartments as $apartment)--}}
{{--            <div class="listing">--}}
{{--                <img src="{{ $apartment->image_url }}" alt="Apartment Image">--}}
{{--                <h3>{{ $apartment->name }}</h3>--}}
{{--                <p>Price: {{ $apartment->price }}</p>--}}
{{--                <p>Floor: {{ $apartment->floor_number }}</p>--}}
{{--                <p>Rooms: {{ $apartment->rooms }}</p>--}}
{{--            </div>--}}
{{--        @endforeach--}}
    </div>
    <button id="showMoreForRent">Show More</button>
    <button id="showLessForRent" style="display:none;">Show Less</button>
</section>
