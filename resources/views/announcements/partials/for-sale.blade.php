@extends('layouts.app')

@section('title', 'For Sale Apartments')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">For Sale Apartments</h2>

        <!-- Filter Form -->
        <form action="{{ route('forSale') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="number" name="min_price" class="form-control" placeholder="Min Price" value="{{ request('min_price') }}">
                </div>
                <div class="col-md-4">
                    <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="{{ request('max_price') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>

        <!-- Apartments List -->
        <div class="row">
            @foreach($apartments as $apartment)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $apartment->image_path) }}" class="card-img-top" alt="Apartment Image">
                        <div class="card-body">
                            <h5 class="card-title">Apartment #{{ $apartment->apartment_number }}</h5>
                            <p class="card-text">Price: {{ number_format($apartment->price, 2) }} ₺</p>
                            <p class="card-text">Rooms: {{ $apartment->room_count }}</p>
                            <p class="card-text">Floor: {{ $apartment->floor_number }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
