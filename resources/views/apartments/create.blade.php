@extends('admin.layouts.app')

@section('title', 'Add Apartment')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-2" style="color: #333;">Add Apartment</h2>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('apartments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="apartment_number" class="font-weight-bold">Apartment Number:</label>
                        <input type="text" id="apartment_number" name="apartment_number" required class="form-control">
                    </div>

                    <div class="form-group mb-1">
                        <label for="room_count" class="font-weight-bold">Room Count:</label>
                        <input type="number" id="room_count" name="room_count" required class="form-control">
                    </div>

                    <div class="form-group mb-1">
                        <label for="floor_number" class="font-weight-bold">Floor Number:</label>
                        <input type="number" id="floor_number" name="floor_number" required class="form-control">
                    </div>

                    <div class="form-group mb-1">
                        <label for="status" class="font-weight-bold">Status:</label>
                        <select name="status" class="form-control" required>
                            <option value="for sale">For Sale</option>
                            <option value="for rent">For Rent</option>
                            <option value="occupied">Occupied</option>
                            <option value="repair">Repair</option>
                        </select>
                    </div>

                    <div class="form-group mb-1">
                        <label for="price" class="font-weight-bold">Price:</label>
                        <input type="number" id="price" name="price" step="0.01" class="form-control">
                    </div>

                    <div class="form-group mb-1">
                        <label for="building_number" class="font-weight-bold">Building Number:</label>
                        <input type="number" id="building_number" name="building_number" required class="form-control">
                    </div>

                    <div class="form-group mb-1">
                        <label for="apartment_images">Apartment Images:</label>
                        <input type="file" class="form-control" name="apartment_images[]" id="apartment_images" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
