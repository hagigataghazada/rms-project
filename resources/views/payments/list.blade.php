@extends('admin.layouts.app')

@section('title', 'Fatura Listesi')

@section('content')
    <div class="content d-flex flex-column w-100 h-100 m-auto align-items-center">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="content" style="width: 80%; background-color: #f4f4f4; padding: 20px; border-radius: 10px;">
                <h2 class="text-center mb-4" style="color: #333;">Fatura Listesi</h2>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <a href="{{ route('payments.create') }}" class="btn btn-primary mb-3" style="display: inline-block; padding: 10px 20px; color: white; border-radius: 5px; text-decoration: none;">Yeni Fatura Ekle</a>
                <table class="table table-bordered" style="background-color: #fff;">
                    <thead>
                    <tr>
                        <th>Apartman Numarası</th>
                        <th>Fatura Türü</th>
                        <th>Tutar</th>
                        <th>Durum</th>
                        <th>Fatura Görüntüsü</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($payments as $payment)
                        <tr>
                            <td>{{ $payment->apartment_number }}</td>
                            <td>{{ ucfirst($payment->type) }}</td>
                            <td>{{ number_format($payment->amount, 2) }} ₺</td>
                            <td>{{ ucfirst($payment->status) }}</td>
                            <td>
                                @if($payment->invoice_image)
                                    <img src="{{ asset('storage/images/invoices/' . $payment->invoice_image) }}" alt="Invoice Image" style="max-width: 100px;">                                @else
                                    <span>Fatura Yok</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">Düzenle</a>
                                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Hiçbir fatura bulunamadı.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
