@extends('admin.layouts.app')

@section('title', 'Add Resident')

@section('content')
    <div class="content d-flex justify-content-center">
        <div class="d-flex" style="min-height: 60vh; width: 800px">
            <div class="container" style="max-width: 600px; background-color: #f4f4f4; padding: 30px; border-radius: 10px;">
                <h2 class="text-center mb-3" style="color: #333;">Add Resident</h2>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('residents.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="font-weight-bold">Name:</label>
                        <input type="text" id="name" name="name" required class="form-control" style="border-radius: 4px;">
                    </div>

                    <div class="form-group mb-2">
                        <label for="email" class="font-weight-bold">Email:</label>
                        <input type="email" id="email" name="email" required class="form-control" style="border-radius: 4px;">
                    </div>

                    <div class="form-group mb-2">
                        <label for="phone" class="font-weight-bold">Phone Number:</label>
                        <input type="number" id="phone" name="phone" class="form-control" style="border-radius: 4px;">
                    </div>

                    <div class="form-group mb-2">
                        <label for="building_number" class="font-weight-bold">Building Number:</label>
                        <input type="number" id="building_number" name="building_number" required class="form-control" style="border-radius: 4px;">
                    </div>

                    <div class="form-group mb-2">
                        <label for="apartment_number" class="font-weight-bold">Apartment Number:</label>
                        <input type="number" id="apartment_number" name="apartment_number" required class="form-control" style="border-radius: 4px;">
                    </div>

                    <div class="form-group mb-2">
                        <label for="password" class="font-weight-bold">Password:</label>
                        <input type="password" id="password" name="password" required class="form-control" style="border-radius: 4px;">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="font-weight-bold">Confirm Password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control" style="border-radius: 4px;">
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 8px; border-radius: 4px;">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
