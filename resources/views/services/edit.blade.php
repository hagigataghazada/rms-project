@extends('admin.layouts.app')

@section('title', 'Servis Düzenle')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="container" style="max-width: 600px; background-color: #f4f4f4; padding: 20px; border-radius: 10px;">
            <h2 class="text-center mb-4" style="color: #333;">Servis Düzenle</h2>
            <form action="{{ route('services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name" class="font-weight-bold">Servis Adı:</label>
                    <input type="text" id="name" name="name" value="{{ $service->name }}" required class="form-control" style="border-radius: 5px;">
                </div>

                <div class="form-group mb-3">
                    <label for="type" class="font-weight-bold">Servis Türü:</label>
                    <input type="text" id="type" name="type" value="{{ $service->type }}" required class="form-control" style="border-radius: 5px;">
                </div>

                <div class="form-group mb-3">
                    <label for="contact_number" class="font-weight-bold">İletişim Numarası:</label>
                    <input type="text" id="contact_number" name="contact_number" value="{{ $service->contact_number }}" required class="form-control" style="border-radius: 5px;">
                </div>

                <button type="submit" class="btn btn-primary btn-block" style="border-radius: 5px;">Güncelle</button>
            </form>
        </div>
    </div>
@endsection
