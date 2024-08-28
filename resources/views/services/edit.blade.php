@extends('admin.layouts.app')

@section('title', 'Servis Düzenle')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="width: 500px; background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
            <h1 style="text-align: center; margin-bottom: 20px;">Servis Düzenle</h1>
            <form action="{{ route('services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div style="margin-bottom: 15px;">
                    <label for="name" style="display: block; margin-bottom: 8px; font-weight: bold;">Servis Adı:</label>
                    <input type="text" id="name" name="name" value="{{ $service->name }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="type" style="display: block; margin-bottom: 8px; font-weight: bold;">Servis Türü:</label>
                    <input type="text" id="type" name="type" value="{{ $service->type }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="contact_number" style="display: block; margin-bottom: 8px; font-weight: bold;">İletişim Numarası:</label>
                    <input type="text" id="contact_number" name="contact_number" value="{{ $service->contact_number }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Güncelle</button>
            </form>
        </div>
    </div>
@endsection
