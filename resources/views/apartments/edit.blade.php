@extends('admin.layouts.app')

@section('title', 'Apartman Düzenle')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="width: 100%; max-width: 500px; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Apartman Düzenle</h2>
            <form action="{{ route('apartments.update', $apartment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="margin-bottom: 15px;">
                    <label for="apartment_id" style="font-weight: bold; display: block;">Apartman ID:</label>
                    <input type="text" id="apartment_id" name="apartment_id" value="{{ $apartment->apartment_id }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="room_count" style="font-weight: bold; display: block;">Oda Sayısı:</label>
                    <input type="number" id="room_count" name="room_count" value="{{ $apartment->room_count }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="floor_number" style="font-weight: bold; display: block;">Kat Numarası:</label>
                    <input type="number" id="floor_number" name="floor_number" value="{{ $apartment->floor_number }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="status" style="font-weight: bold; display: block;">Durum:</label>
                    <select id="status" name="status" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="occupied" {{ $apartment->status == 'occupied' ? 'selected' : '' }}>Dolu</option>
                        <option value="for_rent" {{ $apartment->status == 'for_rent' ? 'selected' : '' }}>Kiralık</option>
                        <option value="for_sale" {{ $apartment->status == 'for_sale' ? 'selected' : '' }}>Satılık</option>
                        <option value="repair" {{ $apartment->status == 'repair' ? 'selected' : '' }}>Onarımda</option>
                    </select>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="price" style="font-weight: bold; display: block;">Fiyat:</label>
                    <input type="number" step="0.01" id="price" name="price" value="{{ $apartment->price }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="building_id" style="font-weight: bold; display: block;">Bina ID:</label>
                    <input type="number" id="building_id" name="building_id" value="{{ $apartment->building_id }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Güncelle</button>
            </form>
        </div>
    </div>
@endsection
