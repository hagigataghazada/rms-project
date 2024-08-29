@extends('admin.layouts.app')

@section('title', 'Fatura Ekle')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg" style="width: 60%; background-color: #f4f4f4; padding: 20px; border-radius: 10px;">
            <h2 class="text-center mb-4" style="color: #333;">Fatura Ekle</h2>
            <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="user_id" class="font-weight-bold">Kullanıcı</label>
                    <select name="user_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="apartment_id" class="font-weight-bold">Apartman</label>
                    <select name="apartment_id" class="form-control" required>
                        @foreach($apartments as $apartment)
                            <option value="{{ $apartment->id }}">{{ $apartment->apartment_id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="type" class="font-weight-bold">Fatura Türü</label>
                    <select name="type" class="form-control" required>
                        <option value="water">Su</option>
                        <option value="gas">Gaz</option>
                        <option value="electricity">Elektrik</option>
                        <option value="elevator">Asansör</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="amount" class="font-weight-bold">Tutar</label>
                    <input type="number" name="amount" class="form-control" placeholder="Tutar" step="0.01" required>
                </div>

                <div class="form-group mb-3">
                    <label for="invoice_image" class="font-weight-bold">Fatura Fotoğrafı</label>
                    <input type="file" name="invoice_image" class="form-control" accept="image/*">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Fatura Ekle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
