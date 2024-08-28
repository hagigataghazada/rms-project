@extends('admin.layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="width: 400px; background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h1 style="text-align: center; margin-bottom: 20px;">Bina Ekle</h1>
            <form action="{{ route('buildings.store') }}" method="POST">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label for="name" style="display: block; margin-bottom: 8px; font-weight: bold;">Bina Adı:</label>
                    <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="apartment_count" style="display: block; margin-bottom: 8px; font-weight: bold;">Apartman Sayısı:</label>
                    <input type="number" id="apartment_count" name="apartment_count" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="building_id" style="display: block; margin-bottom: 8px; font-weight: bold;">Bina Numarası:</label>
                    <input type="number" id="building_id" name="building_id" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Bina Ekle</button>
            </form>
        </div>
    </div>
@endsection
