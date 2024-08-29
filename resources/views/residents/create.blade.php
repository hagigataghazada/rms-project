@extends('admin.layouts.app')

@section('title', 'Resident Kayıt Formu')

@section('content')
    <div class="content d-flex justify-content-center">
        <div class="d-flex" style="min-height: 60vh; width: 800px">
            <div class="container" style="max-width: 600px; background-color: #f4f4f4; padding: 30px; border-radius: 10px;">
                <h2 class="text-center mb-3" style="color: #333;">Resident Kayıt Formu</h2>
                <form action="{{ route('residents.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="font-weight-bold">Ad:</label>
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
                        <label for="building_id" class="font-weight-bold">Bina Numarası:</label>
                        <input type="number" id="building_id" name="building_id" required class="form-control" style="border-radius: 4px;">
                    </div>

                    <div class="form-group mb-2">
                        <label for="apartment_id" class="font-weight-bold">Apartman Numarası:</label>
                        <input type="number" id="apartment_id" name="apartment_id" required class="form-control" style="border-radius: 4px;">
                    </div>

                    <div class="form-group mb-2">
                        <label for="password" class="font-weight-bold">Şifre:</label>
                        <input type="password" id="password" name="password" required class="form-control" style="border-radius: 4px;">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="font-weight-bold">Şifre Onayı:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control" style="border-radius: 4px;">
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 8px; border-radius: 4px;">Kayıt Ol</button>
                </form>
            </div>
        </div>
    </div>
@endsection
