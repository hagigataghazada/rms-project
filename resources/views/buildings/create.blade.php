@extends('admin.layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 600px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4" style="color: #333;">Add Building</h2>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('buildings.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="font-weight-bold">Building Name:</label>
                        <input type="text" id="name" name="name" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="apartment_count" class="font-weight-bold">Apartment Count:</label>
                        <input type="number" id="apartment_count" name="apartment_count" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="building_number" class="font-weight-bold">Building Number:</label>
                        <input type="number" id="building_number" name="building_number" required class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
