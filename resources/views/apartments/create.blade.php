@extends('admin.layouts.app')

@section('title', 'Apartman Ekle')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="width: 100%; max-width: 500px; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Apartman Ekle</h2>
            <form action="{{ route('apartments.store') }}" method="POST">
                @csrf
                <div>
                    <label for="apartment_id" style="font-weight: bold;">Apartman Numarası:</label>
                    <input type="text" id="apartment_id" name="apartment_id" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div>
                    <label for="room_count" style="font-weight: bold;">Oda Sayısı:</label>
                    <input type="number" id="room_count" name="room_count" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div>
                    <label for="floor_number" style="font-weight: bold;">Kat Numarası:</label>
                    <input type="number" id="floor_number" name="floor_number" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div>
                    <label for="status" style="font-weight: bold;">Durum:</label>
                    <select id="status" name="status" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="occupied">Meşgul</option>
                        <option value="for_rent">Kiralık</option>
                        <option value="for_sale">Satılık</option>
                        <option value="repair">Tamirde</option>
                    </select>
                </div>

                <div>
                    <label for="price" style="font-weight: bold;">Fiyat:</label>
                    <input type="number" id="price" name="price" step="0.01" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div>
                    <label for="building_id" style="font-weight: bold;">Bina Numarası:</label>
                    <input type="number" id="building_id" name="building_id" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Apartman Ekle</button>
            </form>
        </div>
    </div>
@endsection
