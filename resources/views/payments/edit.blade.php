@extends('admin.layouts.app')

@section('title', 'Fatura Düzenle')

@section('content')
    <div class="container" style="max-width: 600px; margin: 20px auto; background-color: white; padding: 20px; border-radius: 8px;">
        <h2 style="text-align: center; margin-bottom: 20px;">Fatura Düzenle</h2>
        <form action="{{ route('payments.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="user_id" style="font-weight: bold; margin-bottom: 8px; display: block;">Kullanıcı</label>
                <select name="user_id" class="form-control" style="width: 100%; padding: 10px;" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $payment->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="apartment_id" style="font-weight: bold; margin-bottom: 8px; display: block;">Apartman</label>
                <select name="apartment_id" class="form-control" style="width: 100%; padding: 10px;" required>
                    @foreach($apartments as $apartment)
                        <option value="{{ $apartment->id }}" {{ $payment->apartment_id == $apartment->id ? 'selected' : '' }}>{{ $apartment->apartment_id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="type" style="font-weight: bold; margin-bottom: 8px; display: block;">Fatura Türü</label>
                <select name="type" class="form-control" style="width: 100%; padding: 10px;" required>
                    <option value="water" {{ $payment->type == 'water' ? 'selected' : '' }}>Su</option>
                    <option value="gas" {{ $payment->type == 'gas' ? 'selected' : '' }}>Gaz</option>
                    <option value="electricity" {{ $payment->type == 'electricity' ? 'selected' : '' }}>Elektrik</option>
                    <option value="elevator" {{ $payment->type == 'elevator' ? 'selected' : '' }}>Asansör</option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="amount" style="font-weight: bold; margin-bottom: 8px; display: block;">Tutar</label>
                <input type="number" name="amount" class="form-control" style="width: 100%; padding: 10px;" value="{{ $payment->amount }}" required>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="status" style="font-weight: bold; margin-bottom: 8px; display: block;">Durum</label>
                <select name="status" class="form-control" style="width: 100%; padding: 10px;" required>
                    <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Ödendi</option>
                    <option value="unpaid" {{ $payment->status == 'unpaid' ? 'selected' : '' }}>Ödenmedi</option>
                    <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Beklemede</option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="invoice_image" style="font-weight: bold; margin-bottom: 8px; display: block;">Fatura Fotoğrafı</label>
                <input type="file" name="invoice_image" class="form-control" style="width: 100%; padding: 10px;" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px;">Güncelle</button>
        </form>
    </div>
@endsection
