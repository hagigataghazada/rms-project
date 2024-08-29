@extends('admin.layouts.app')

@section('title', 'Fatura Düzenle')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="content bg-light p-4 rounded shadow" style="width: 50%; max-width: 500px; background-color: #f4f4f4; padding: 20px; border-radius: 10px;">
            <h2 class="text-center mb-4" style="color: #333;">Fatura Düzenle</h2>
            <form action="{{ route('payments.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="user_id" class="form-label fw-bold">Kullanıcı</label>
                    <select name="user_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $payment->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="apartment_id" class="form-label fw-bold">Apartman</label>
                    <select name="apartment_id" class="form-control" required>
                        @foreach($apartments as $apartment)
                            <option value="{{ $apartment->id }}" {{ $payment->apartment_id == $apartment->id ? 'selected' : '' }}>{{ $apartment->apartment_id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="type" class="form-label fw-bold">Fatura Türü</label>
                    <select name="type" class="form-control" required>
                        <option value="water" {{ $payment->type == 'water' ? 'selected' : '' }}>Su</option>
                        <option value="gas" {{ $payment->type == 'gas' ? 'selected' : '' }}>Gaz</option>
                        <option value="electricity" {{ $payment->type == 'electricity' ? 'selected' : '' }}>Elektrik</option>
                        <option value="elevator" {{ $payment->type == 'elevator' ? 'selected' : '' }}>Asansör</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="amount" class="form-label fw-bold">Tutar</label>
                    <input type="number" name="amount" class="form-control" value="{{ $payment->amount }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="status" class="form-label fw-bold">Durum</label>
                    <select name="status" class="form-control" required>
                        <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Ödendi</option>
                        <option value="unpaid" {{ $payment->status == 'unpaid' ? 'selected' : '' }}>Ödenmedi</option>
                        <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Beklemede</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="invoice_image" class="form-label fw-bold">Fatura Fotoğrafı</label>
                    <input type="file" name="invoice_image" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary w-100">Güncelle</button>
            </form>
        </div>
    </div>
@endsection
