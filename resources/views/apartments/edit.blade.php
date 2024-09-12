@extends('admin.layouts.app')

@section('title', 'Edit Apartment')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-2" style="color: #333;">Edit Apartment</h2>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('apartments.update', $apartment->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-2">
                        <label for="apartment_number" class="font-weight-bold">Apartment Number:</label>
                        <input type="text" id="apartment_number" name="apartment_number" value="{{ $apartment->apartment_number }}" required class="form-control">
                    </div>

                    <div class="form-group mb-1">
                        <label for="room_count" class="font-weight-bold">Room Count:</label>
                        <input type="number" id="room_count" name="room_count" value="{{ $apartment->room_count }}" required class="form-control">
                    </div>

                    <div class="form-group mb-1">
                        <label for="floor_number" class="font-weight-bold">Floor Number:</label>
                        <input type="number" id="floor_number" name="floor_number" value="{{ $apartment->floor_number }}" required class="form-control">
                    </div>

                    <div class="form-group mb-1">
                        <label for="status" class="font-weight-bold">Status:</label>
                        <select id="status" name="status" required class="form-control">
                            <option value="occupied" {{ $apartment->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                            <option value="for rent" {{ $apartment->status == 'for rent' ? 'selected' : '' }}>For Rent</option>
                            <option value="for sale" {{ $apartment->status == 'for sale' ? 'selected' : '' }}>For Sale</option>
                            <option value="repair" {{ $apartment->status == 'repair' ? 'selected' : '' }}>Repair</option>
                        </select>
                    </div>

                    <div class="form-group mb-1">
                        <label for="price" class="font-weight-bold">Price:</label>
                        <input type="number" step="0.01" id="price" name="price" value="{{ $apartment->price }}" class="form-control">
                    </div>

                    <div class="form-group mb-1">
                        <label for="building_number" class="font-weight-bold">Building Number:</label>
                        <input type="number" id="building_number" name="building_number" value="{{ $apartment->building_number }}" required class="form-control">
                    </div>

                    <div class="form-group mb-1">
                        <label for="apartment_images" class="font-weight-bold">Apartment Images:</label>
                        <input type="file" class="form-control" name="apartment_images[]" id="apartment_images" multiple>
                        <small class="form-text text-muted">Add new image to replace old images.</small>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
