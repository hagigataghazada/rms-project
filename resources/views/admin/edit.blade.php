@extends('admin.layouts.app')

@section('title', 'Profil Düzenle')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4" style="color: #333;">Profil Düzenle</h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="name" class="font-weight-bold">Ad Soyad:</label>
                        <input type="text" id="name" name="name" value="{{ $admin->name }}" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="font-weight-bold">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $admin->email }}" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="font-weight-bold">Şifre:</label>
                        <input type="password" id="password" name="password" class="form-control">
                        <small class="text-muted">Eğer şifreyi değiştirmek istemiyorsanız boş bırakın.</small>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="font-weight-bold">Şifre Onayı:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
@endsection
