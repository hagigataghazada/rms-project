@extends('admin.layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 600px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4" style="color: #333;">Bina Düzenle</h2>
                <form action="{{ route('buildings.update', $building->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="name" class="font-weight-bold">Bina Adı:</label>
                        <input type="text" id="name" name="name" value="{{ $building->name }}" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="building_id" class="font-weight-bold">Bina ID:</label>
                        <input type="number" id="building_id" name="building_id" value="{{ $building->building_id }}" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="apartment_count" class="font-weight-bold">Apartman Sayısı:</label>
                        <input type="number" id="apartment_count" name="apartment_count" value="{{ $building->apartment_count }}" required class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
@endsection
