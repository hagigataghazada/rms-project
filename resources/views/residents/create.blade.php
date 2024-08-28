@extends('admin.layouts.app')

@section('title', 'Resident Kayıt Formu')

@section('content')
    <div class="container" style="display: flex; flex-direction: column; justify-content: center; width: 500px; background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); margin: 20px auto;">
        <h1 style="text-align: center; margin-bottom: 20px;">Resident Kayıt Formu</h1>
        <form action="{{ route('residents.store') }}" method="POST">
            @csrf
            <div>
                <label for="name" style="display: block; margin-bottom: 8px; font-weight: bold;">Ad:</label>
                <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div>
                <label for="email" style="display: block; margin-bottom: 8px; font-weight: bold;">Email:</label>
                <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div>
                <label for="phone" style="display: block; margin-bottom: 8px; font-weight: bold;">Phone Number:</label>
                <input type="number" id="phone" name="phone" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div>
                <label for="building_id" style="display: block; margin-bottom: 8px; font-weight: bold;">Bina Numarası:</label>
                <input type="number" id="building_id" name="building_id" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div>
                <label for="apartment_id" style="display: block; margin-bottom: 8px; font-weight: bold;">Apartman Numarası:</label>
                <input type="number" id="apartment_id" name="apartment_id" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div>
                <label for="password" style="display: block; margin-bottom: 8px; font-weight: bold;">Şifre:</label>
                <input type="password" id="password" name="password" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div>
                <label for="password_confirmation" style="display: block; margin-bottom: 8px; font-weight: bold;">Şifre Onayı:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Kayıt Ol</button>
        </form>
    </div>
@endsection
