@extends('admin.layouts.app')

@section('title', 'Fatura Listesi')

@section('content')
    <div class="container" style="max-width: 1000px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Fatura Listesi</h2>
        <a href="{{ route('payments.create') }}" class="btn btn-primary" style="margin-bottom: 20px; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 4px; text-decoration: none; display: inline-block; text-align: center; transition: background-color 0.3s ease;">
            Yeni Fatura Ekle
        </a>
        <table class="table table-bordered" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
            <tr>
                <th style="padding: 12px; text-align: left; background-color: #f2f2f2; color: #333; font-weight: bold;">Kullanıcı</th>
                <th style="padding: 12px; text-align: left; background-color: #f2f2f2; color: #333; font-weight: bold;">Apartman</th>
                <th style="padding: 12px; text-align: left; background-color: #f2f2f2; color: #333; font-weight: bold;">Fatura Türü</th>
                <th style="padding: 12px; text-align: left; background-color: #f2f2f2; color: #333; font-weight: bold;">Tutar</th>
                <th style="padding: 12px; text-align: left; background-color: #f2f2f2; color: #333; font-weight: bold;">Durum</th>
                <th style="padding: 12px; text-align: left; background-color: #f2f2f2; color: #333; font-weight: bold;">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @forelse($payments as $payment)
                <tr style="border-bottom: 1px solid #ddd; background-color: {{ $loop->even ? '#f9f9f9' : '#fff' }};">
                    <td style="padding: 12px;">{{ optional($payment->user)->name }}</td>
                    <td style="padding: 12px;">{{ optional($payment->apartment)->apartment_id }}</td>
                    <td style="padding: 12px;">
                        @if($payment->type == 'water')
                            Su
                        @elseif($payment->type == 'gas')
                            Gaz
                        @elseif($payment->type == 'electricity')
                            Elektrik
                        @elseif($payment->type == 'elevator')
                            Asansör
                        @endif
                    </td>
                    <td style="padding: 12px;">{{ number_format($payment->amount, 2) }} ₺</td>
                    <td style="padding: 12px;">
                        @if($payment->status == 'paid')
                            <span style="color: green;">Ödendi</span>
                        @elseif($payment->status == 'unpaid')
                            <span style="color: red;">Ödenmedi</span>
                        @elseif($payment->status == 'pending')
                            <span style="color: orange;">Beklemede</span>
                        @endif
                    </td>
                    <td style="padding: 12px;">
                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning" style="padding: 5px 10px; background-color: #ffc107; color: white; border-radius: 4px; text-decoration: none; margin-right: 5px; transition: background-color 0.3s ease;">
                            Düzenle
                        </a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 5px 10px; background-color: #dc3545; color: white; border-radius: 4px; text-decoration: none; transition: background-color 0.3s ease; border: none;" onclick="return confirm('Bu faturayı silmek istediğinize emin misiniz?')">Sil</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 12px; color: #777;">Fatura bulunamadı.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
