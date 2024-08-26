<!-- resources/views/partials/for-sale.blade.php -->
<section id="for-sale">
    <h2>For Sale</h2>
    <div class="listing-container">
        <!-- Her bir satılık apartman için -->
{{--        @foreach($forSaleApartments as $apartment)--}}
{{--            <div class="listing">--}}
{{--                <img src="{{ $apartment->image_url }}" alt="Apartment Image">--}}
{{--                <h3>{{ $apartment->name }}</h3>--}}
{{--                <p>Price: {{ $apartment->price }}</p>--}}
{{--                <p>Floor: {{ $apartment->floor_number }}</p>--}}
{{--                <p>Rooms: {{ $apartment->rooms }}</p>--}}
{{--            </div>--}}
{{--        @endforeach--}}
    </div>
    <button id="showMoreForSale">Show More</button>
    <button id="showLessForSale" style="display:none;">Show Less</button>
</section>
