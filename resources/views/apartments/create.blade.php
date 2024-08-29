@extends('admin.layouts.app')

@section('title', 'Apartman Ekle')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4" style="color: #333;">Apartman Ekle</h2>
                <form action="{{ route('apartments.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="apartment_id" class="font-weight-bold">Apartman Numarası:</label>
                        <input type="text" id="apartment_id" name="apartment_id" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="room_count" class="font-weight-bold">Oda Sayısı:</label>
                        <input type="number" id="room_count" name="room_count" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="floor_number" class="font-weight-bold">Kat Numarası:</label>
                        <input type="number" id="floor_number" name="floor_number" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="status" class="font-weight-bold">Durum:</label>
                        <select id="status" name="status" required class="form-control">
                            <option value="occupied">Meşgul</option>
                            <option value="for_rent">Kiralık</option>
                            <option value="for_sale">Satılık</option>
                            <option value="repair">Tamirde</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price" class="font-weight-bold">Fiyat:</label>
                        <input type="number" id="price" name="price" step="0.01" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="building_id" class="font-weight-bold">Bina Numarası:</label>
                        <input type="number" id="building_id" name="building_id" required class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Apartman Ekle</button>
                </form>
            </div>
        </div>
    </div>
@endsection
