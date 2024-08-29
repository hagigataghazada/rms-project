@extends('admin.layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 600px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4" style="color: #333;">Bina Ekle</h2>
                <form action="{{ route('buildings.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="font-weight-bold">Bina Adı:</label>
                        <input type="text" id="name" name="name" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="apartment_count" class="font-weight-bold">Apartman Sayısı:</label>
                        <input type="number" id="apartment_count" name="apartment_count" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="building_id" class="font-weight-bold">Bina Numarası:</label>
                        <input type="number" id="building_id" name="building_id" required class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Bina Ekle</button>
                </form>
            </div>
        </div>
    </div>
@endsection
