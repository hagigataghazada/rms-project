@extends('announcements.announcements')

@section('title', 'For Rent Apartments')

@section('content')
    <h2 class="text-center my-5">For Rent Apartments</h2>

    <form action="{{ route('forRent') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="number" name="min_price" class="form-control" placeholder="Min Rent" value="{{ request('min_price') }}">
            </div>
            <div class="col-md-3">
                <input type="number" name="max_price" class="form-control" placeholder="Max Rent" value="{{ request('max_price') }}">
            </div>
            <div class="col-md-3">
                <input type="number" name="room_count" class="form-control" placeholder="Rooms" value="{{ request('room_count') }}">
            </div>
            <div class="col-md-3">
                <input type="number" name="floor_number" class="form-control" placeholder="Floor" value="{{ request('floor_number') }}">
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach($forRentApartments as $apartment)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @php
                        $images = json_decode($apartment->image_path); // JSON formatında kaydedilmiş fotoğrafları çöz
                    @endphp

                    @if($images)
                        <div id="carouselApartment{{ $apartment->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($images as $index => $image)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="Apartment Image">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselApartment{{ $apartment->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselApartment{{ $apartment->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">Apartment #{{ $apartment->apartment_number }}</h5>
                        <p class="card-text">Rent: {{ number_format($apartment->price, 2) }} ₺</p>
                        <p class="card-text">Rooms: {{ $apartment->room_count }}</p>
                        <p class="card-text">Floor: {{ $apartment->floor_number }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
