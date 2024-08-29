@extends('admin.layouts.app')

@section('title', 'Resident Düzenle')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg" style="width: 60%; background-color: #f4f4f4; padding: 20px; border-radius: 10px;">
            <h2 class="text-center mb-4" style="color: #333;">Resident Düzenle</h2>
            <form action="{{ route('residents.update', $resident->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name" class="font-weight-bold">Ad:</label>
                    <input type="text" id="name" name="name" value="{{ $resident->name }}" required class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="font-weight-bold">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $resident->email }}" required class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="phone_number" class="font-weight-bold">Telefon Numarası:</label>
                    <input type="text" id="phone_number" name="phone_number" value="{{ $resident->phone_number }}" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="apartment_id" class="font-weight-bold">Apartman Numarası:</label>
                    <input type="text" id="apartment_id" name="apartment_id" value="{{ $resident->apartment_id }}" required class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="font-weight-bold">Şifre (Değiştirmek istemiyorsanız boş bırakın):</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="password_confirmation" class="font-weight-bold">Şifre Onayı:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Güncelle</button>
            </form>
        </div>
    </div>
@endsection
