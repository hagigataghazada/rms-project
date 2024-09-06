@extends('admin.layouts.app')

@section('title', 'Edit Apartment')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4" style="color: #333;">Edit Apartment</h2>
                <form action="{{ route('apartments.update', $apartment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="apartment_number" class="font-weight-bold">Apartment Number:</label>
                        <input type="text" id="apartment_number" name="apartment_number" value="{{ $apartment->apartment_number }}" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="room_count" class="font-weight-bold">Room Count:</label>
                        <input type="number" id="room_count" name="room_count" value="{{ $apartment->room_count }}" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="floor_number" class="font-weight-bold">Floor Number:</label>
                        <input type="number" id="floor_number" name="floor_number" value="{{ $apartment->floor_number }}" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="status" class="font-weight-bold">Status:</label>
                        <select id="status" name="status" required class="form-control">
                            <option value="occupied" {{ $apartment->status == 'occupied' ? 'selected' : '' }}>occupied</option>
                            <option value="for rent" {{ $apartment->status == 'for rent' ? 'selected' : '' }}>for rent</option>
                            <option value="for sale" {{ $apartment->status == 'for sale' ? 'selected' : '' }}>for sale</option>
                            <option value="repair" {{ $apartment->status == 'repair' ? 'selected' : '' }}>repair</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price" class="font-weight-bold">Price:</label>
                        <input type="number" step="0.01" id="price" name="price" value="{{ $apartment->price }}" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="building_number" class="font-weight-bold">Building Number:</label>
                        <input type="number" id="building_number" name="building_number" value="{{ $apartment->building_number }}" required class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
