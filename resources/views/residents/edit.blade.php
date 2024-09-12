@extends('admin.layouts.app')

@section('title', 'Edit Resident')

@section('content')
    <div class="d-flex justify-content-center align-items-start" style="height: 100vh; margin-top: 20px; padding: 30px;">
        <div class="card shadow-lg" style="width: 60%; background-color: #f4f4f4; padding: 20px; border-radius: 10px;">
            <h2 class="text-center mb-1" style="color: #333;">Edit Resident</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('residents.update', $resident->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-1">
                    <label for="name" class="font-weight-bold">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $resident->name }}" required class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="font-weight-bold">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $resident->email }}" required class="form-control">
                </div>

                <div class="form-group mb-1">
                    <label for="phone_number" class="font-weight-bold">Phone Number:</label>
                    <input type="text" id="phone_number" name="phone_number" value="{{ $resident->phone_number }}" class="form-control">
                </div>

                <div class="form-group mb-1">
                    <label for="building_number" class="font-weight-bold">Building Number:</label>
                    <input type="text" id="building_number" name="building_number" value="{{ $resident->building_number }}" required class="form-control">
                </div>

                <div class="form-group mb-1">
                    <label for="apartment_number" class="font-weight-bold">Apartment Number:</label>
                    <input type="text" id="apartment_number" name="apartment_number" value="{{ $resident->apartment_number }}" required class="form-control">
                </div>

                <div class="form-group mb-1">
                    <label for="password" class="font-weight-bold">Password (If you do not want to change leave empty):</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <div class="form-group mb-1">
                    <label for="password_confirmation" class="font-weight-bold">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </form>
        </div>
    </div>
@endsection
